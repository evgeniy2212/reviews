#!/bin/sh
/usr/bin/php /home/u771985207/domains/reviews4results.com/reviews4results/artisan schedule:run 1>> /dev/null 2>&1
/usr/bin/php /home/u771985207/domains/reviews4results.com/reviews4results/artisan queue:work --queue=high,default
