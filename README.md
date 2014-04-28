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

Options Overview
------------

In the **ansiblealexa.yml** configuration file you can find the following options.

```
# SSH Details
# Usage: Required for mounting the `media` directory using SSHFS.
ssh_server: aatest.alexandalexa.com
ssh_username: ***
ssh_password: ***

# Personal Details
# Usage: Used for the Magento and Wordpress installations.
user_email: user@alexandalexa.com

# Database Credentials
# Usage: Connections for root and remote using a single password
#        as defined in `db_password`.
db_username_root: root
db_username_remote: developer

db_hostname: localhost
db_password: ansiblealexa

db_name_magento: magento
db_name_wordpress: wordpress

# IP Addresses
# Usage: IP addresses that map to `host_magento` and `host_wordpress`
#        respectively - `ip_database` is used for the remote MySQL
#        connection.
ip_database: 192.168.50.3
ip_magento: 192.168.50.4
ip_wordpress: 192.168.50.5

# Vagrant
# Usage: Port Vagrant listens for incoming connections on, as well as
#        CPUs used, and the memory in MB allocated to the Vagrant instance.
vagrant_port: 3001
vagrant_cpus: 2
vagrant_memory: 4096

# Hostnames
# Usage: Hostnames that should be mapped to the IP addresses defined above.
host_magento: magento.dev.alexandalexa.com
host_wordpress: wordpress.dev.alexandalexa.com

# Repositories
# Usage: GitHub repositories that hold the Magento and Wordpress code-bases.
repository_magento: git@github.com:alexandalexa/hephaestus.git
repository_wordpress: git@github.com:alexandalexa/Wordpress.git

# Playbooks
# Usage: Complete list of playbooks that will be played during a `vagrant provision`.
playbooks:

  # Usage: Playbooks that are played prevenient to mounting the devices.
  pre_sync:
    - repository
    - nfs

  # Usage: Playbooks that are played subsequent to mounting the devices.
  post_sync:
    - nginx
    - php
    - mysql
    - config
    - sshfs
    - hosts
```

Welcome Screen
------------

Considering everything ran successfully, you should be presented with the details that you defined in the configuration. The settings demonstrate how you can load the Magento and Wordpress instances &ndash; as well as connecting remotely with MySQL.

<img src="http://i.imgur.com/p9i2llV.png" alt="Welcome screen" />

From then on all you need to do is modify your hosts file to represent the IP addresses shown in the welcome screen above &ndash; yours may differ depending on your configuration.

```
192.168.50.4 magento.dev.alexandalexa.com
192.168.50.5 wordpress.dev.alexandalexa.com
```