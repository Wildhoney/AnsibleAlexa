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

<table>
    <tr>
        <th>Key</th>
        <th>Default Value</th>
        <th>Description</th>
    </tr>
    <tr>
        <td><code>ssh_server</code></td>
        <td><code>aatest.alexandalexa.com</code></td>
        <td>Server which stores the <code>media</code> directory &ndash; will be mounted using <a href="http://fuse.sourceforge.net/sshfs.html" target="_blank">SSHFS</a>.</td>
    </tr>
    <tr>
        <td><code>ssh_user</code></td>
        <td><code><em>None</em></code></td>
        <td>Username for the aforementioned SSH address.</td>
    </tr>
    <tr>
        <td><code>ssh_password</code></td>
        <td><code><em>None</em></code></td>
        <td>Password for the aforementioned SSH address.</td>
    </tr>
    <tr>
        <td><code>user_email</code></td>
        <td><code>user@alexandalexa.com</code></td>
        <td>Used for the Magento and Wordpress installations.</td>
    </tr>
    <tr>
        <td><code>db_username_root</code></td>
        <td><code>root</code></td>
        <td>MySQL username for root access.</td>
    </tr>
    <tr>
        <td><code>db_username_remote</code></td>
        <td><code>developer</code></td>
        <td>MySQL username for remote access.</td>
    </tr>
    <tr>
        <td><code>db_hostname</code></td>
        <td><code>localhost</code></td>
        <td>MySQL address for the root connection.</td>
    </tr>
    <tr>
        <td><code>db_password</code></td>
        <td><code>ansiblealexa</code></td>
        <td>MySQL password for both <code>root</code> and <code>developer</code> connections.</td>
    </tr>
    <tr>
        <td><code>db_name_magento</code></td>
        <td><code>magento</code></td>
        <td>Name for the Magento MySQL database.</td>
    </tr>
    <tr>
        <td><code>db_name_wordpress</code></td>
        <td><code>wordpress</code></td>
        <td>Name for the Wordpress MySQL database.</td>
    </tr>
    <tr>
        <td><code>ip_database</code></td>
        <td><code>192.168.50.3</code></td>
        <td>IP address used to connect to the Vagrant database with <code>developer</code>.</td>
    </tr>
    <tr>
        <td><code>ip_magento</code></td>
        <td><code>192.168.50.4</code></td>
        <td>IP address that <code>magento.dev.alexandalexa.com</code> should map to.</td>
    </tr>
    <tr>
        <td><code>ip_wordpress</code></td>
        <td><code>192.168.50.5</code></td>
        <td>IP address that <code>wordpress.dev.alexandalexa.com</code> should map to.</td>
    </tr>
    <tr>
        <td><code>vagrant_port</code></td>
        <td><code>3001</code></td>
        <td>Port that the Vagrant instance accepts connections on.</td>
    </tr>
    <tr>
        <td><code>vagrant_cpus</code></td>
        <td><code>2</code></td>
        <td>Amount of CPUs that Vagrant will attempt to utilise.</td>
    </tr>
    <tr>
        <td><code>vagrant_memory</code></td>
        <td><code>4096</code></td>
        <td>Amount of memory in MB allocated to the Vagrant instance.</td>
    </tr>
    <tr>
        <td><code>host_magento</code></td>
        <td><code>magento.dev.alexandalexa.com</code></td>
        <td>Domain used for the Nginx configuration that maps to <code>192.168.50.4</code>.</td>
    </tr>
    <tr>
        <td><code>host_wordpress</code></td>
        <td><code>wordpress.dev.alexandalexa.com</code></td>
        <td>Domain used for the Nginx configuration that maps to <code>192.168.50.5</code>.</td>
    </tr>
    <tr>
        <td><code>repository_magento</code></td>
        <td><code>git@github.com:alexandalexa/hephaestus.git</code></td>
        <td>GitHub repository which contains the Magento codebase.</td>
    </tr>
    <tr>
        <td><code>repository_wordpress</code></td>
        <td><code>git@github.com:alexandalexa/Wordpress.git</code></td>
        <td>GitHub repository which contains the Wordpress codebase.</td>
    </tr>
    <tr>
        <td><code>playbooks.pre_sync</code></td>
        <td><code>Array</code></td>
        <td>Playbooks which are played prevenient to the mounting of the devices.</td>
    </tr>
    <tr>
        <td><code>playbooks.post_sync</code></td>
        <td><code>Array</code></td>
        <td>Playbooks which are played subsequent to the mounting of the devices.</td>
    </tr>
</table>

Welcome Screen
------------

Considering everything ran successfully, you should be presented with the details that you defined in the configuration. The settings demonstrate how you can load the Magento and Wordpress instances &ndash; as well as connecting remotely with MySQL.

<img src="http://i.imgur.com/p9i2llV.png" alt="Welcome screen" />

From then on all you need to do is modify your hosts file to represent the IP addresses shown in the welcome screen above &ndash; yours may differ depending on your configuration.

```
192.168.50.4 magento.dev.alexandalexa.com
192.168.50.5 wordpress.dev.alexandalexa.com
```