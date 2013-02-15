
saveToGithub() {
	echo "Ge en kommentar till dina ändringar!";
	read kommentar;
        git commit -m kommentar;
        git push;
}

echo "Försöker spara alla filer."
git add -A;
git status;
read -p "Vad statusen bra?(j/n)" jn;

case "$jn" in
   [Jj]* )  saveToGithub;;
   [Nn]* )  exit;;
       * )  echo "Var snäll och svara ja eller nej.";;
esac


saveToGithub() {
	echo "Ge en kommentar till dina ändringar!";
	read kommentar;
        git commit -m kommentar;
        git push;
}

echo "Försöker spara alla filer."
git add -A;
git status;
read -p "Vad statusen bra?(j/n)" jn;

case "$jn" in
   [Jj]* )  saveToGithub;;
   [Nn]* )  exit;;
       * )  echo "Var snäll och svara ja eller nej.";;
esac

