# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  # Default options for the VM.
  config.vm.box = "precise64"
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"
  config.vm.network "forwarded_port", guest: 80, host: 3005

  # Configure the synchronised directories.
  config.vm.synced_folder "./websites/magento", "/var/www/html/magento/web-root"
  config.vm.synced_folder "./websites/wordpress", "/var/www/html/wordpress/content"

  # Install all dependencies, and invoke Ansible.

  #config.vm.provision "ansible" do |ansible|
    # ansible.playbook = "ansible/playbooks/development.yml"
  #end

  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "ansible/playbooks/nginx.yml"
  end

end