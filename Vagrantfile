# -*- mode: ruby -*-
# vi: set ft=ruby :

# Dependencies.
require 'yaml'

# Parse the configuration file.
options = YAML.load_file('ansiblealexa.yml')

VAGRANTFILE_API_VERSION = "2"

# IP addresses for the various components.
ip_database  = "#{options['ip_database']}"
ip_magento   = "#{options['ip_magento']}"
ip_wordpress = "#{options['ip_wordpress']}"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  # Default options for the VM.

  config.vm.box = "precise64"
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"
  config.vm.network "forwarded_port", guest: 80, host: options['vagrant_port']
  config.vm.network "private_network", ip: ip_database
  config.vm.network "private_network", ip: ip_magento
  config.vm.network "private_network", ip: ip_wordpress

  config.vm.provider "virtualbox" do |virtualbox|
    virtualbox.memory = options['vagrant_memory']
    virtualbox.cpus   = options['vagrant_cpus']
  end

  # Run playbooks from the "pre_sync" object.
  options['playbooks']['pre_sync'].each do |playbook|

      config.vm.provision "ansible" do |ansible|
        ansible.playbook = "ansible/playbooks/#{playbook}.yml"
      end

  end

  # Configure the synchronised directories.

  config.vm.synced_folder "./websites/magento", "/usr/share/nginx/www/magento",
                          create: true, owner: "root", group: "root"

  config.vm.synced_folder "./websites/wordpress", "/usr/share/nginx/www/wordpress",
                          create: true, owner: "root", group: "root"

  # Run playbooks from the "post_sync" object.
  options['playbooks']['post_sync'].each do |playbook|

      config.vm.provision "ansible" do |ansible|
        ansible.playbook = "ansible/playbooks/#{playbook}.yml"
      end

  end

end