v4lctl bright 85% && fswebcam -r 640x480 --jpeg 85 image0.jpeg -d /dev/video0 
fswebcam -c /home/illum/.fswebcam.conf 
#v4lctl contrast 100% && streamer -f jpeg -o image.jpeg -s 1024x768
