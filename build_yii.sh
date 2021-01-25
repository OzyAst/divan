#!/bin/bash
php yii migrate/fresh --interactive=0
php yii fixture/load "*" --interactive=0
vendor/bin/codecept run
rm build_yii.sh