alias ll='ls -l';

alias git-clone='git clone';
alias git-add='git add .';
alias git-rm='git rm';
alias git-mv='git mv';
alias git-status='git status';
alias git-commit='git commit -m';
alias git-fetch-upstream='git fetch upstream'
alias git-fetch-hts-upstream='git fetch hts-upstream'

gitPath="https://github.com/";
mkPath="https://github.com/magnuskronnas";

echo $mkPath;

function hts-begin() {
     echo "Påbörjar ditt projekt.";
     echo "Skapa ett github konto.";
	echo "Vilket namn valde du på kontot?";
	read konto;
	echo "Ditt konto är på $gitPath$konto"
      echo "Gaffla $mkPath/HTSWebsite med ditt Github konto."
	read -p "Tryck på enter när du är klar."

     git clone $gitPath$konto/HTSWebsite; 
     cd HTSWebsite;
     git remote add hts-upstream $mkPath/HTSWebsite
      echo "Påbörjar ditt projekt genom att skriva hts-start";
      cd ..;
}


function hts-start() {
     echo "Försöker uppdatera alla gemensamma filer."
	cd HTSWebsite;
	git fetch hts-upstream;
     git merge hts-upstream/master;
	cp File/bashrc ../.bashrc;
}

function hts-to-github() {
      git commit -m $1;
      git push;
}

function hts-end() {
     echo "Försöker spara alla filer."
	git add .;
	git status;
	read -p "Vad statusen bra?(j/n)" jn;
     case "$jn" in
        [Jj]* )  hts-to-github $1;;
        [Nn]* )  exit;;
        * ) echo "Var snäll och svara ja eller nej.";;
      esac
}

