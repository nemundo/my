git submodule foreach --recursive "git add *||true"
git submodule foreach --recursive "git commit -m '.'||true"
git submodule foreach --recursive "git push||true"