AnsibleAlexa
============

Purpose
---

AnsibleAlexa allows you to deploy the Magento and Wordpress instances. It uses <a href="http://www.vagrantup.com/" target="_blank">Vagrant</a> to create an empty box, and <a href="http://www.ansible.com/home" target="_blank">Ansible</a> playbooks to configure the server.

<img src="http://i.imgur.com/8JXQwdB.png" alt="Vagrant and Ansible" />

It also mounts the `media` directory using <a href="http://fuse.sourceforge.net/sshfs.html" target="_blank">SSHFS</a>.

Getting Started
---

All of the AnsibleAlexa configuration exists in the **ansiblealexa.yml** file in the root directory. There is an example provided as **ansiblealexa.yml.example** that you'll need to copy and modify.

`cp ansiblealexa.yml.example ansiblealexa.yml`

Once you've created the YAML configuration file, most of the values should be correct. However, you'll need to modify the `user_email` key, and define the `ssh_user` and `ssh_password` values which pertain to the remote server where the media directory exists.

You can then issue the command `vagrant up` to begin the whole process!

<img src="http://i.imgur.com/WyTqeI2.png" alt="Vagrant up command" />