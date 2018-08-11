#!/bin/sh

# MVCを作成

# all or controller, model, template
MVC=$1
# all=users controller,model=Users
ModelName=$2

php bin/cake.php bake $MVC $ModelName
