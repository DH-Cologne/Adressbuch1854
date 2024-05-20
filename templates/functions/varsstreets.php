
<?php

//$street_name and $street_new are two variables to save name_old_clean and name_new on zotero with zoterostreets's function. 

				$street_name=$street->name_old_clean;
				$street_new=isset($street->name_new) ? ($street->name_new) : $street_name;
				
				
				$no_old=[];
				$no_new=[];

				foreach ($street->arrondissements as $arro) {
					// code...
					//print_r($street->arrondissements);
					//print('<br>');
					if($arro->type === 'pre1860'){

					array_push($no_old, $arro->no);	
					}
					else{

					array_push($no_new, $arro->no);
					}
				}


				$no_old=implode(',', $no_old);
				$no_new=implode(',', $no_new);