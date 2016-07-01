//J'instancie mon client
DefaultHttpClient client = new DefaultHttpClient();	
//J'appel mon WS
HttpGet get = new HttpGet("http://10.0.2.2/WEBSERVICE/LstProduit.php"); 
//Je recup�re la r�ponsse
HttpResponse responseGet = client.execute(get);
HttpEntity resEntityGet = responseGet.getEntity();
//Si j'ai une reponsse...
if (resEntityGet != null) {
	//... je la recup�re dans une chaine
	String reponse = EntityUtils.toString(resEntityGet);
	//Je place ma chaine(qui est un tableau JSON g�n�r� en PHP) dans un tableau associatif en JSON dont la cl�e de la premi�re et unique case est "tab"
    reponse = "{\"tab\":" + reponse + "}";
	//Je convertie ma chaine en JSONObject
    JSONObject jObject = new JSONObject(reponse);
	//A partir de la cl�e "tab" de mon tableau assoc cr�� pr�c�dement, je recup�re le contenu(le JSON g�n�r� par PHP donc) et le place dans un JSONArray
    JSONArray itemArray = jObject.getJSONArray("tab");
	//Je recupre le nombre d'�l�ment...
    int nbItemArray = itemArray.length();
	//... pour pouvoire traiter mon tableau dans une boucle
   	for (int i=0;i != nbItemArray; i++)
  	{
		//traitement de mon tableau JSON
  	}        				
}