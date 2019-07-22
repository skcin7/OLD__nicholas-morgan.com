#!/bin/bash

# Set default commit message.
MESSAGE="Deploy script used to push to production server on `date '+%d/%m/%Y_%H:%M:%S'`."

# Parse input to get git commit message:
for i in "$@"
do
case $i in
    -m=*|--message=*)
        MESSAGE="${i#*=}"
        shift # past argument=value
    ;;
    *)
        # unknown option
    ;;
esac
done

# Compile/minify JavaScripts/CSS:
npm run prod

# Add all files of current saved version and commit with commit message.
git add -A .
git commit -m "${MESSAGE}"

# Push to server:
git push