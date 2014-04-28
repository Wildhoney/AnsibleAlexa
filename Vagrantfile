# -*- mode: ruby -*-
# vi: set ft=ruby :

require 'yaml'
config = YAML.load_file('ansiblealexa.yml')

VAGRANTFILE_API_VERSION = "2"

# IP addresses for the various components.
ipDatabase  = "#{config['ip_database']}"
ipMagento   = "#{config['ip_magento']}"
ipWordpress = "#{config['ip_wordpress']}"

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

  # Install all dependencies, and invoke Ansible.

  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "ansible/playbooks/repository.yml"
  end

  # Configure the synchronised directories.

  config.vm.synced_folder "./websites/magento", "/usr/share/nginx/www/magento",
                          create: true, owner: "root", group: "root"

  config.vm.synced_folder "./websites/wordpress", "/usr/share/nginx/www/wordpress",
                          create: true, owner: "root", group: "root"

  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "ansible/playbooks/nginx.yml"
  end

  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "ansible/playbooks/php.yml"
  end

  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "ansible/playbooks/mysql.yml"
  end

  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "ansible/playbooks/config.yml"
  end

  config.vm.provision "ansible" do |ansible|
    ansible.verbose = "vvvv"
    ansible.playbook = "ansible/playbooks/sshfs.yml"
  end

  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "ansible/playbooks/hosts.yml"
  end

end