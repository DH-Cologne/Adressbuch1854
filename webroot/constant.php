
<?php

//constant for generate balise span zotero of persons view
//$person=htmlentities($person);

			

				$ldh=isset($person->ldh_rank['rank']) ? ($person->ldh_rank['rank']) : 'aucun rang';
					$precision=isset($person->specification_verbatim) ? ($person->specification_verbatim) : 'inconnu';
					$precision2=$person->profession_verbatim;
					$military_status=$person->military_status->status;
					$social_status=$person->social_status->status;
					$occupation_status=$person->occupation_status->status;
					$gender=$person->gender;
					if($gender === 'M'){

							$gender='Männlich';

						} elseif ($gender === 'F'){
							
							$gender='Weiblich';
						} else {
							
							$gender='Nicht bekannt';
						};

			
				//$street_name=$street->name_old_clean;
				//$street_new=$street->name_new;