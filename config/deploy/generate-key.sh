#!/bin/sh
mkdir -p .ssh
ssh-keygen -t ed25519 -a 20 -C AMD-DEPLOY-KEY -f .ssh/id_ed25519
