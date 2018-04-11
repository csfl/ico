# ico
etc-kyc


server command: ssh -i "test1_emining.pem" ubuntu@52.70.187.243

server ip: 52.70.187.243

testing server: ssh -i "ubuntu@13.124.111.194.pem" ubuntu@13.124.111.194

ubuntu@ec2-52-87-106-143.compute-1.amazonaws.com

//Set up kyc-eth system

//install mysql npm node nvm go-ethereum

// mysql 
sudo apt-get update
sudo apt-get install mysql-server
mysql_secure_installation
//go-ethereum 
git clone https://github.com/ethereum/go-ethereum



 Step-1: After the installation process configure the files in the config folder which is in
controllers.
Step-2: Open config folder then open autoload.php and edit the libraries like
$autoload['libraries'] = array('database','session');
$autoload['helper'] = array('url','user');
Step-3: After autoload.php open config.php and edit the file like
$config['base_url'] = ' http://url name/project name/';
Step-4: After config.php, setup the database which is in database.php,open it and edit it
'hostname' => 'Name of host',
'username' => 'root',
'password' => 'password',
'database' => 'Name of database',
Installing Ethereum
Step-5: Now install the ethereum by following commands
sudo apt-get install software-properties-common
sudo add-apt-repository -y ppa:ethereum/ethereum
sudo apt-get update
sudo apt-get install ethereum
Step-5: Now Run the command nohup geth --rpc --rpccorsdomain "*" --rpcapi "web3,eth,net,personal,miner"
&
Press Ctrl+D to keep it running
Step-6: Replace Contract address in server.js in app folder with your contract address
Step-7: Run
Npm install
screen npm start

//installing and set up go and go-ethereum 
go version 1.8.3
Ubuntu version 16.04

sudo apt-get update
sudo apt-get -y upgrade
//download
sudo curl -O https://storage.googleapis.com/golang/go1.8.3.linux-amd64.tar.gz

//unpack
sudo tar -xvf go1.8.3.linux-amd64.tar.gz
//move to usr/local
sudo mv go /usr/local

sudo nano ~/.profile

//add export 
PATH=$PATH:/usr/local/go/bin 
//at the end of file 

//refresh
source ~/.profile

//check go install
go version

//create directory for go 
mkdir $HOME/work

//Now you can point Go to the new workspace you just created by exporting GOPATH.

export GOPATH=$HOME/work

cd go-ethereum
make geth

// Run to start server
"/home/ubuntu/go-ethereum/build/bin/geth" to launch geth
/home/ubuntu/go-ethereum/build/bin/geth

or  Run to deploy 
nohup build/bin/geth --rpc --rpccorsdomain "*" --rpcapi "web3,eth,net,personal,miner" &





///set up kyc system 

install php apache2 phpMyAdmin Mysql on ubuntu  (https://www.youtube.com/watch?v=avEDRh8gGGY)

//importing database to phpmyadmin

//mac built-in apache set up 
https://medium.com/@JohnFoderaro/how-to-set-up-apache-in-macos-sierra-10-12-bca5a5dfffba



