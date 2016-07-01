//J'instancie mon client
DefaultHttpClient client = new DefaultHttpClient();	
//J'appel mon WS
HttpGet get = new HttpGet("http://10.0.2.2/WEBSERVICE/LstProduit.php"); 
//Je recupére la réponsse
HttpResponse responseGet = client.execute(get);
HttpEntity resEntityGet = responseGet.getEntity();
//Si j'ai une reponsse...
if (resEntityGet != null) {
	//... je la recupére dans une chaine
	String reponse = EntityUtils.toString(resEntityGet);
	//Je place ma chaine(qui est un tableau JSON généré en PHP) dans un tableau associatif en JSON dont la clée de la premiére et unique case est "tab"
    reponse = "{\"tab\":" + reponse + "}";
	//Je convertie ma chaine en JSONObject
    JSONObject jObject = new JSONObject(reponse);
	//A partir de la clée "tab" de mon tableau assoc créé précédement, je recupére le contenu(le JSON généré par PHP donc) et le place dans un JSONArray
    JSONArray itemArray = jObject.getJSONArray("tab");
	//Je recupre le nombre d'élément...
    int nbItemArray = itemArray.length();
	//... pour pouvoire traiter mon tableau dans une boucle
   	for (int i=0;i != nbItemArray; i++)
  	{
		//traitement de mon tableau JSON
  	}        				
}