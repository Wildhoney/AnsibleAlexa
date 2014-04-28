# -*- mode: ruby -*-
# vi: set ft=ruby :

# Dependencies.
require 'yaml'
require 'json'

# Parse the configuration file, and the npm file.
yamlConfig = YAML.load_file('ansiblealexa.yml')
npmConfig  = JSON.parse(File.read('package.json'))

VAGRANTFILE_API_VERSION = "2"

# IP addresses for the various components.
ipDatabase  = "#{yamlConfig['ip_database']}"
ipMagento   = "#{yamlConfig['ip_magento']}"
ipWordpress = "#{yamlConfig['ip_wordpress']}"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  # Default options for the VM.

  config.vm.box = "precise64"
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"
  config.vm.network "forwarded_port", guest: 80, host: 3001
  config.vm.network "private_network", ip: ipDatabase
  config.vm.network "private_network", ip: ipMagento
  config.vm.network "private_network", ip: ipWordpress

  config.vm.provider "virtualbox" do |virtualbox|
    virtualbox.memory = 4096
    virtualbox.cpus   = 2
  end

  # Run playbooks from the "presync" object in the "package.json".
  npmConfig['vagrant']['presync'].each do |playbook|

      config.vm.provision "ansible" do |ansible|
        ansible.playbook = "ansible/playbooks/#{playbook}.yml"
      end

  end

  # Configure the synchronised directories.

  config.vm.synced_folder "./websites/magento", "/usr/share/nginx/www/magento",
                          create: true, owner: "root", group: "root"

  config.vm.synced_folder "./websites/wordpress", "/usr/share/nginx/www/wordpress",
                          create: true, owner: "root", group: "root"

  # Run playbooks from the "postsync" object in the "package.json".
  npmConfig['vagrant']['postsync'].each do |playbook|

      config.vm.provision "ansible" do |ansible|
        ansible.playbook = "ansible/playbooks/#{playbook}.yml"
      end

  end

end