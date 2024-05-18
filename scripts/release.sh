#!/bin/bash

if [ -z "$1" ]; then
  echo "Por favor, proporciona una version. Uso: $0 <version>"
  exit 1
fi

VERSION=$1
BRANCH="release-branch-$VERSION"
TAG="v$VERSION"
RELEASE_MESSAGE="Release v$VERSION"
REMOTE="origin"
SUBDIR="simple-shopping-cart"

git checkout main
git pull $REMOTE main

git checkout -b $BRANCH

git filter-repo --subdirectory-filter $SUBDIR

git tag -a $TAG -m "$RELEASE_MESSAGE"

git push $REMOTE $BRANCH
git push $REMOTE $TAG

# delete release branch
git checkout main
git branch -D $BRANCH
git push $REMOTE --delete $BRANCH

echo "Release branch and tag created and pushed to GitHub successfully. Version $VERSION"