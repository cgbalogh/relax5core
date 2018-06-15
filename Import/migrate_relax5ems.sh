#! /bin/bash

# generate msql_import script and execute
# $1 = source db
# $2 = target db
# $3 = target pid
# $4 = host
# $5 = user
# $6 = pw
# syntax migrate_relax5core.sh <sourcedb> <targetdb> <targetpid> <host> <user> <pw>

sed 's/###SOURCE_DB###/'$1'/g' ./migrate_relax5ems.tmpl | sed 's/###TARGET_DB###/'$2'/g' | sed 's/###TARGET_PID###/'$3'/g' > ./migrate_relax5ems.sql
mysql -u $5 -h $4 -p$6 < ./migrate_relax5ems.sql
