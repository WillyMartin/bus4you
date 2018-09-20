; <?php exit(); ?>

[db]
; MySQL host
server 			= bus4you.mysql.tools

; DB username
user 			= bus4you_keitaro

; DB password
password		= "y4eeykj3"

; DB name
name			= bus4you_keitaro

; Prefix for tables
prefix			= keitaro_

; Optional
[db_slave]
; MySQL host
server 			= 

; DB username
user 			= 

; DB password
password		= 

; DB name
name			= 

; Prefix for tables
prefix			= 


[system]

; Debug mode (false or true)
debug			= false

; Max size of log files
log_max_size	= 1000000

; Salt for passwords
salt			= "6408713155a46414a3051e6.33702691"

; Login attempts before block
max_auth_tries	= 5

; Default charset of keywords
keywords_charset = "utf-8"

; Charset for csv reports
csv_charset = "utf-8"

; Demo mode
demo = false

; UserAgent for monitoring client
monitoring_user_agent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.0.5) Gecko/2008120122 Firefox/3.0.5"

; Enable logging to file /var/log/postbacks.log
postback_log = true

; Comma-separated list (https://v8.help.keitarotds.com/vcm) or leave it empty
vcm_engines = ""

; Comma-separated list of vcm engines to ignore
vcm_ignore_engines = ""

; Set value of objects that will be checked by one request according your tariff plan https://viruscheckmate.com/tariffs/
vcm_objects_per_request = 1

; UA Profile or leave empty to check with all available
vcm_ua = "Chrome 33 on Windows 7"

; Enable logging to file /var/log/vcm.log
vcm_log = true

; Engines that are used to check in avscan.ru (available: kis, nod, avt, dwb)
avscan_engines = kis, nod, avt, dwb

; IP resolve method (domain/server)
resolve_method = domain

; Data processing settings
data_processor_chunk_size = 4000
data_processor_limit = 50

; Back compatibility
compatibility_v6 = false
compatibility_v7 = false

; Logging options
;log_level = debug|info|notice|warning|error|critical|alert|emergency
log_level = warning

;The maximal amount of log files to keep (0 means unlimited)
max_log_files = 10

; Subid generation algorithm (uuid/random)
subid_algorithm = uuid
