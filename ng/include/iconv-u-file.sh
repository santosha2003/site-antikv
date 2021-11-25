#!/bin/sh


# find in the base system FreeBSD 11+ or Linux fc centos 6 7 32 64 ubuntu archlinux  - env file at the same path

# Backup!  if already utf or not windows-1251 - broken files

#find . -type f -name '*.php' \
n=$#

echo $1
echo $n
 iconv -f cp1251 -t utf-8 $1  > $1.new
  mv -f $1.new $1
