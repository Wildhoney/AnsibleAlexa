AnsibleAlexa
============

Purpose
---

AnsibleAlexa allows you to deploy the Magento and Wordpress instances. It uses <a href="http://www.vagrantup.com/" target="_blank">Vagrant</a> to create an empty box, and <a href="http://www.ansible.com/home" target="_blank">Ansible</a> playbooks to configure the server.

<img src="http://i.imgur.com/8JXQwdB.png" alt="Vagrant and Ansible" />

It also mounts the `media` directory using <a href="http://fuse.sourceforge.net/sshfs.html" target="_blank">SSHFS</a>.

Getting Started
---

All of the AnsibleAlexa configuration exists in the **ansiblealexa.yml** file in the root directory. There is an example provided as **example.ansiblealexa.yml** that you'll need to copy and modify.

`cp example.ansiblealexa.yml ansiblealexa.yml`

Once you've created the YAML configuration file, most of the values should be correct. However, you'll need to modify the `user_email` key, and define the `ssh_user` and `ssh_password` values which pertain to the remote server where the media directory exists.

You can then issue the command `bundle install` and then `vagrant up` to begin the whole process!

<img src="http://i.imgur.com/eKzKoll.png" alt="Vagrant up command" />

Welcome Screen
------------

Considering everything ran successfully, you should be presented with the details that you defined in the configuration. The settings demonstrate how you can load the Magento and Wordpress instances &ndash; as well as connecting remotely with MySQL.

<img src="http://i.imgur.com/p9i2llV.png" alt="Welcome screen" />

From then on all you need to do is modify your hosts file to represent the IP addresses shown in the welcome screen above &ndash; yours may differ depending on your configuration.

```
192.168.50.4 magento.dev.alexandalexa.com
192.168.50.5 wordpress.dev.alexandalexa.com
```