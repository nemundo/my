### Clone (with Submodule)
```
git clone --recursive https://github.com/nemundo/dev.git 
cd <path>
git submodule foreach git checkout master

git submodule foreach git pull
git submodule update --recursive
```

### Git Branch 
```
git branch new <sha1-of-commit>
git branch -d master
git branch -m new master
```


### delete branch remotely
```
git push origin --delete remoteBranchName
```







### Save Credentials
```
git config --global credential.helper store
```


### Create Tag
```
git tag 0.1
git push --tags
```

### Delete Tag
```
git tag -d 0.1
```


### Branch Merge
```
git merge new
```


### Delete History
```
git checkout --orphan latest_branch
git add -A
git commit -am "."
git branch -D master
git branch -m master
git push -f origin master
```

