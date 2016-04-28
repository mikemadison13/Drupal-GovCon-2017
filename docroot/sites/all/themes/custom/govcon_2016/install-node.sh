#!/usr/bin/env bash

if [ $# -ne 1 ]; then
    echo $0: usage: install-node.sh 0.12.7
    exit 1
fi

if [ ! -d "$HOME/.nvm" ]; then
  echo "Downloading and installing nvm"
  curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.30.2/install.sh | bash
fi

NVM_VERISON=$1
export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh"  # This loads nvm
if [[ $(nvm ls $NVM_VERISON | grep "N/A") ]]; then
  echo "Downloading and installing node version $NVM_VERISON"
  nvm download $NVM_VERISON
  nvm install $NVM_VERISON
fi

# Sets version of node in nvm config so that nvm use doesn't 
# need to be called for every new shell.
echo $NVM_VERISON > "$HOME/.nvmrc"

echo "Please run the following command":
echo "source ~/.bashrc && nvm use --delete-prefix $NVM_VERISON"
