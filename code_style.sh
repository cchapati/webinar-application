DIR="./src"
if [ $1 ]
then
    DIR="$1"
fi

echo "**********************************************"
echo "* Code Style                                 *"
echo "**********************************************"
phpcs --extensions=php --standard=ruleset.xml $DIR --report=full

echo ""
echo "**********************************************"
echo "* Mess Detector                              *"
echo "**********************************************"
phpmd $DIR text rulesetMD.xml

echo ""
echo "**********************************************"
echo "* Copy Paste Detector                        *"
echo "**********************************************"
#phpcpd --verbose --min-lines 25 $DIR
