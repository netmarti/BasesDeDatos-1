<?php	
	$dom = new domDocument;
	
	if(file_exists('../auditoria.xml')){
		$dom->load('../auditoria.xml');
		echo "Existe";
	}
	else{
		$dom = new DOMDocument('1.0');
		$logs = $dom->appendChild($dom->createElement('logs'));
		echo "no existe, se crea el dom document\n";
	
	}
	echo "importamos el documento\n";	
	//DOM
	//$log = $dom->appendChild($dom->createElement('log'));
	//$log->appendChild($dom->createElement('query',"string query"));
	//$log->appendChild($dom->createElement('date',date('d/m/Y H:i:s')));	
	
	
	//Agregamos los elementos que necesitamos
	//SIMPLEXML
	//$log = $sim->logs[0]->addChild('log');
	$sim = simplexml_import_dom($dom);
	
	//echo "importado adecuadamente\n";
	$log = $sim->addChild('log');
	$log->addChild('query',$sql);
	$log->addChild('date',date('d/m/Y H:i:s'));
	echo $sim->asXML();
	$sim->asXML('../auditoria.xml');
	echo "<p> Guardado </p>";
	/*
	$dom_sxe = dom_import_simplexml($sim);
	
	if (!$dom_sxe) {
		echo 'Error while converting XML';
		exit;
	}else 
		echo "<p> OK </p>";
	$dom2 = new DOMDocument('1.0');
	$dom_sxe = $dom2->importNode($dom_sxe, true);
	$dom_sxe = $dom2->appendChild($dom_sxe);
	$dom2->save('../auditoria.xml');*/
	
	//$dom_sxe->save('auditoria_sxe.xml');
	//echo  $sim->asXML();
	//echo $dom->save('../auditoria.xml');
	
?>	
	
	
	