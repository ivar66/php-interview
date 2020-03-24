#Supervisor使用详解

## 一、supervisor简介&功能
简介：
supervisor 是python开发的一套进程管理的程序 ，能将一个普通的命令行进程变为后台daemon（保护进程），并监控进程状态，异常退出时能自动重启。

基本功能：
- 1、它是通过fork/exec的方式把这些被管理的进程当作supervisor的子进程来启动，这样只要在supervisor的配置文件中，把要管理的进程的可执行文件的路径写进去即可。
- 2、实现当子进程挂掉的时候，父进程可以准确获取子进程挂掉的信息的，可以选择是否自己启动和报警。
- 3、supervisor还提供了一个功能，可以为supervisor或者每个子进程，设置一个非root的user，这个user就可以管理它对应的进程。

注：本文以centos8为例。

## 二、supervisor安装
方法一、配置好yum源后，可以直接安装
```shell
yum install supervisor
```
方法二、Debian/Ubuntu可通过apt安装
```shell
apt-get install supervisor
```
方法三、pip安装
```shell
pip install supervisor
```
方法四、easy_install安装
```shell
easy_install supervisor
```

## 三、配置文件说明
3.1、supervisor.conf配置文件(位置：/etc/supervisord.conf)说明：
```shell

; Sample supervisor config file.

[unix_http_server]
file=/run/supervisor/supervisor.sock   ; (the path to the socket file) # socket对应的文件
;chmod=0700                 ; socket file mode (default 0700) # socket文件的mod，默认是0700
;chown=nobody:nogroup       ; socket file uid:gid owner # socket文件的owner，格式：uid:gid
;username=user              ; (default is no username (open server)) # 默认无用户名
;password=123               ; (default is no password (open server)) # 默认无密码

;[inet_http_server]         ; inet (TCP) server disabled by default # 默认关闭的tcp服务器，提供管理页面
;port=127.0.0.1:9001        ; (ip_address:port specifier, *:port for all iface) # Web管理后台运行的IP和端口，如果开放到公网，需要注意安全性
;username=user              ; (default is no username (open server)) # 登录管理后台的用户名
;password=123               ; (default is no password (open server)) # 登录管理后台的密码

[supervisord]
logfile=/var/log/supervisor/supervisord.log  ; (main log file;default $CWD/supervisord.log) # 日志文件，默认是 $CWD/supervisord.log
logfile_maxbytes=50MB       ; (max main logfile bytes b4 rotation;default 50MB)
logfile_backups=10          ; (num of main logfile rotation backups;default 10)
loglevel=info               ; (log level;default info; others: debug,warn,trace)
pidfile=/run/supervisord.pid ; (supervisord pidfile;default supervisord.pid)
nodaemon=false              ; (start in foreground if true;default false)
minfds=1024                 ; (min. avail startup file descriptors;default 1024)
minprocs=200                ; (min. avail process descriptors;default 200)
;umask=022                  ; (process file creation umask;default 022)
;user=chrism                 ; (default is current user, required if root)
;identifier=supervisor       ; (supervisord identifier, default is 'supervisor')
;directory=/tmp              ; (default is not to cd during start)
;nocleanup=true              ; (don't clean up tempfiles at start;default false)
;childlogdir=/tmp            ; ('AUTO' child log dir, default $TEMP)
;environment=KEY=value       ; (key value pairs to add to environment)
;strip_ansi=false            ; (strip ansi escape codes in logs; def. false)

; the below section must remain in the config file for RPC
; (supervisorctl/web interface) to work, additional interfaces may be
; added by defining them in separate rpcinterface: sections
[rpcinterface:supervisor]
supervisor.rpcinterface_factory = supervisor.rpcinterface:make_main_rpcinterface

[supervisorctl]
serverurl=unix:///run/supervisor/supervisor.sock ; use a unix:// URL  for a unix socket
;serverurl=http://127.0.0.1:9001 ; use an http:// url to specify an inet socket
;username=chris              ; should be same as http_username if set
;password=123                ; should be same as http_password if set
;prompt=mysupervisor         ; cmd line prompt (default "supervisor")
;history_file=~/.sc_history  ; use readline history if available

; The below sample program section shows all possible program subsection values,
; create one or more 'real' program: sections to be able to control them under
; supervisor.

;[program:theprogramname]
;command=/bin/cat              ; the program (relative uses PATH, can take args)
;process_name=%(program_name)s ; process_name expr (default %(program_name)s)
;numprocs=1                    ; number of processes copies to start (def 1)
;directory=/tmp                ; directory to cwd to before exec (def no cwd)
;umask=022                     ; umask for process (default None)
;priority=999                  ; the relative start priority (default 999)
;autostart=true                ; start at supervisord start (default: true)
;autorestart=true              ; retstart at unexpected quit (default: true)
;startsecs=10                  ; number of secs prog must stay running (def. 1)
;startretries=3                ; max # of serial start failures (default 3)
;exitcodes=0,2                 ; 'expected' exit codes for process (default 0,2)
;stopsignal=QUIT               ; signal used to kill process (default TERM)
;stopwaitsecs=10               ; max num secs to wait b4 SIGKILL (default 10)
;user=chrism                   ; setuid to this UNIX account to run the program
;redirect_stderr=true          ; redirect proc stderr to stdout (default false)
;stdout_logfile=/a/path        ; stdout log path, NONE for none; default AUTO
;stdout_logfile_maxbytes=1MB   ; max # logfile bytes b4 rotation (default 50MB)
;stdout_logfile_backups=10     ; # of stdout logfile backups (default 10)
;stdout_capture_maxbytes=1MB   ; number of bytes in 'capturemode' (default 0)
;stdout_events_enabled=false   ; emit events on stdout writes (default false)
;stderr_logfile=/a/path        ; stderr log path, NONE for none; default AUTO
;stderr_logfile_maxbytes=1MB   ; max # logfile bytes b4 rotation (default 50MB)
;stderr_logfile_backups=10     ; # of stderr logfile backups (default 10)
;stderr_capture_maxbytes=1MB   ; number of bytes in 'capturemode' (default 0)
;stderr_events_enabled=false   ; emit events on stderr writes (default false)
;environment=A=1,B=2           ; process environment additions (def no adds)
;serverurl=AUTO                ; override serverurl computation (childutils)

; The below sample eventlistener section shows all possible
; eventlistener subsection values, create one or more 'real'
; eventlistener: sections to be able to handle event notifications
; sent by supervisor.

;[eventlistener:theeventlistenername]
;command=/bin/eventlistener    ; the program (relative uses PATH, can take args)
;process_name=%(program_name)s ; process_name expr (default %(program_name)s)
;numprocs=1                    ; number of processes copies to start (def 1)
;events=EVENT                  ; event notif. types to subscribe to (req'd)
;buffer_size=10                ; event buffer queue size (default 10)
;directory=/tmp                ; directory to cwd to before exec (def no cwd)
;umask=022                     ; umask for process (default None)
;priority=-1                   ; the relative start priority (default -1)
;autostart=true                ; start at supervisord start (default: true)
;autorestart=unexpected        ; restart at unexpected quit (default: unexpected)
;startsecs=10                  ; number of secs prog must stay running (def. 1)
;startretries=3                ; max # of serial start failures (default 3)
;exitcodes=0,2                 ; 'expected' exit codes for process (default 0,2)
;stopsignal=QUIT               ; signal used to kill process (default TERM)
;stopwaitsecs=10               ; max num secs to wait b4 SIGKILL (default 10)
;user=chrism                   ; setuid to this UNIX account to run the program
;redirect_stderr=true          ; redirect proc stderr to stdout (default false)
;stdout_logfile=/a/path        ; stdout log path, NONE for none; default AUTO
;stdout_logfile_maxbytes=1MB   ; max # logfile bytes b4 rotation (default 50MB)
;stdout_logfile_backups=10     ; # of stdout logfile backups (default 10)
;stdout_events_enabled=false   ; emit events on stdout writes (default false)
;stderr_logfile=/a/path        ; stderr log path, NONE for none; default AUTO
;stderr_logfile_maxbytes=1MB   ; max # logfile bytes b4 rotation (default 50MB)
;stderr_logfile_backups        ; # of stderr logfile backups (default 10)
;stderr_events_enabled=false   ; emit events on stderr writes (default false)
;environment=A=1,B=2           ; process environment additions
;serverurl=AUTO                ; override serverurl computation (childutils)

; The below sample group section shows all possible group values,
; create one or more 'real' group: sections to create "heterogeneous"
; process groups.

;[group:thegroupname]
;programs=progname1,progname2  ; each refers to 'x' in [program:x] definitions
;priority=999                  ; the relative start priority (default 999)

; The [include] section can just contain the "files" setting.  This
; setting can list multiple files (separated by whitespace or
; newlines).  It can also contain wildcards.  The filenames are
; interpreted as relative to this file.  Included files *cannot*
; include files themselves.

[include]
files = supervisord.d/*.ini
```
3.2 、子配置文件说明（子配置文件是我们最需要关注的，以及经常配置的文件）

子进程配置文件,可以添加在主配置文件的conf中，也可以编写一个配置文件，放在/etc/supervisor.d/目录下，以.ini作为扩展名（每个进程的配置文件都可以单独分拆也可以把相关的脚本放一起）。

如任意定义一个和脚本相关的项目名称的选项组（/etc/supervisord.d/test.ini）：

例子:
```shell
#项目名
[program:test]
#脚本目录
directory=/opt/bin
#脚本执行命令
command=/usr/bin/python /opt/bin/test.py

#supervisor启动的时候是否随着同时启动，默认True
autostart=true
#当程序exit的时候，这个program不会自动重启,默认unexpected，设置子进程挂掉后自动重启的情况，有三个选项，false,unexpected和true。如果为false的时候，无论什么情况下，都不会被重新启动，如果为unexpected，只有当进程的退出码不在下面的exitcodes里面定义的
autorestart=false
#这个选项是子进程启动多少秒之后，此时状态如果是running，则我们认为启动成功了。默认值为1
startsecs=1

#脚本运行的用户身份 
user = www

#日志输出 
stderr_logfile=/tmp/test_stderr.log 
stdout_logfile=/tmp/test_stdout.log 
#把stderr重定向到stdout，默认 false
redirect_stderr = true
#stdout日志文件大小，默认 50MB
stdout_logfile_maxbytes = 50M
#stdout日志文件备份数
stdout_logfile_backups = 20
```

## 四、supervisor常用命令
```$
supervisord -c /etc/supervisord.conf #启动supervisor服务命令
supervisorctl status                #查看所有进程的状态
supervisorctl stop test             #停止设置的test进程
supervisorctl start test            #启动设置的test进程
supervisorctl restart test          #重新启动设置的test进程
supervisorctl update ：             #配置文件修改后可以使用该命令加载新的配置
supervisorctl reload:               #重新启动配置中的所有程序
```

## 常见问题集锦
> 1、unix:///var/run/supervisor/supervisor.sock no such file
```text
问题描述：安装好supervisor没有开启服务直接使用supervisorctl报的错
解决办法：supervisord -c /etc/supervisord.conf 
```
2、command中指定的进程已经起来，但supervisor还不断重启
```text
问题描述：command中启动方式为后台启动，导致识别不到pid，然后不断重启，
解决办法：supervisor无法检测后台启动进程的pid，而supervisor本身就是后台启动守护进程，因此不用担心这个
```
3、启动了多个supervisord服务，导致无法正常关闭服务
```text
问题描述：在运行supervisord -c /etc/supervisord.conf 之前，我直接运行过supervisord -c /etc/supervisord.d/xx.ini，导致有些进程被多个superviord管理，无法正常关闭进程。
解决办法：使用ps -ef | grep supervisord 查看所有启动过的supervisord服务，kill相关的进程。
```    