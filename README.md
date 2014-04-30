AnsibleAlexa
============

Purpose
---

AnsibleAlexa allows you to deploy the Magento and Wordpress instances. It uses <a href="http://www.vagrantup.com/" target="_blank">Vagrant</a> to create an empty box, and <a href="http://www.ansible.com/home" target="_blank">Ansible</a> playbooks to configure the server.

<img src="http://i.imgur.com/8JXQwdB.png" alt="Vagrant and Ansible" />

It also:

 - Mounts the `media` directory using <a href="http://fuse.sourceforge.net/sshfs.html" target="_blank">SSHFS</a>;
 - Invokes `bower install` to install all front-end dependencies;
 - Configures a MySQL remote user to connect via SequelPro/SQLYog;
 - Reindexes all necessary Magento indexes;
 - Clears Magento cache &ndash; and Lightspeed;
 - Configures APC cache on the PHP instance;
 - Sets up a self-signed SSL certificate for HTTPS;
 - ...And much, much more!

Quick Start
---

 * Install Vagrant: <a href="https://www.vagrantup.com/downloads" target="_blank">https://www.vagrantup.com/downloads</a>;
 * Install Ansible: `brew install ansible`;
 * Create **ansiblealexa.yml** file: `cp example.ansiblealexa.yml ansiblealexa.yml`;
 * Update SSH details in **ansiblealexa.yml**;
 * Initialise Vagrant: `vagrant up`;
 * Update hosts file: `sudo vim /etc/private/hosts`;
 * Voila! Open <a href="http://localhost:3001/" target="_blank">http://localhost:3001/</a>;

Getting Started
---

All of the AnsibleAlexa configuration exists in the **ansiblealexa.yml** file in the root directory. There is an example provided as **example.ansiblealexa.yml** that you'll need to copy and modify.

`cp example.ansiblealexa.yml ansiblealexa.yml`

Once you've created the YAML configuration file, most of the values should be correct. However, you'll need to modify the `user_email` key, and define the `ssh_user` and `ssh_password` values which pertain to the remote server where the media directory exists.

You can then issue the command `bundle install` and then `vagrant up` to begin the whole process!

<img src="http://i.imgur.com/eKzKoll.png" alt="Vagrant up command" />
Considering everything ran successfully, you should be presented with the details that you defined in the configuration. The settings demonstrate how you can load the Magento and Wordpress instances &ndash; as well as connecting remotely with MySQL.

From then on all you need to do is modify your hosts file to represent the IP addresses shown in the welcome screen above &ndash; yours may differ depending on your configuration.

```
192.168.50.3 db.alexandalexa.com
192.168.50.4 mg.alexandalexa.com
192.168.50.5 wp.alexandalexa.com
```

Known Issues
---

When your computer loses connectivity, but Vagrant remains awake, SSHFS will unmount the `media` directory &ndash; this can be remedied by running `vagrant provision`.