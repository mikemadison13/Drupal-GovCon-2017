#!/bin/bash

# Prepares a release branch.
# Example usage: DB_URL=mysql://user:password@server/db ./release-branch.sh 3.12.0

RELEASE_BRANCH=release/$1

# Ensure we are on a mainline release branch.
BRANCH=$(git rev-parse --abbrev-ref HEAD)

if [[ $BRANCH =~ ^8\.x\-[0-9]+\.x$ ]]; then
  CHANGE_LOG=logs/$1.md

  if [[ ! -f $CHANGE_LOG ]]; then
    echo "$CHANGE_LOG must exist before creating a release branch."
    exit 1
  fi

  git pull
  git fetch origin --tags
  git checkout -b $RELEASE_BRANCH

  cd logs
  ./generate.sh > ../CHANGELOG.md
  cd ..

  composer update
  cp composer.lock tests/fixtures/$1.lock

  git add .
  git commit --quiet --message "$1 Release"
  git push --set-upstream origin $RELEASE_BRANCH
else
  echo "This can only be done from a mainline release branch, e.g. 8.x-4.x."
  exit 1
fi
