#! /bin/bash

SSH_USERNAME_HOST=codegewerk@codegewerk.lima-ssh.de
APP_DIR_NAME=analytics-service
TEMP_DIR=tmp

mkdir $TEMP_DIR/
cp server/authorized-origins.prod.php $TEMP_DIR/authorized-origins.php
cp server/index.php $TEMP_DIR/

# transfer data to server
scp -r $TEMP_DIR/ $SSH_USERNAME_HOST:

rm -R $TEMP_DIR/

# get existing data
ssh $SSH_USERNAME_HOST cp $APP_DIR_NAME/data.csv $TEMP_DIR/

ssh $SSH_USERNAME_HOST rm -R $APP_DIR_NAME/
ssh $SSH_USERNAME_HOST mv $TEMP_DIR/ $APP_DIR_NAME/