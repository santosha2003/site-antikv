<?
$MESS ['WF_STATUS_CHANGE_NAME'] = "Le statut de document a été changé";
$MESS ['WF_STATUS_CHANGE_DESC'] = "
#ID# - ID
#ADMIN_EMAIL# - l'e-mail d'administrateurs de flux de production 
#BCC# - l'e-mail des utilisateurs qui ont déjà modifié le document quelque temps ou qui peuvent modifier cela 
#PREV_STATUS_ID# - ID de statut précédent du document 
#PREV_STATUS_TITLE# - le nom de statut précédent du document 
#STATUS_ID# - statut ID
#STATUS_TITLE# - titre de statut
#DATE_ENTER# - date de création de document
#ENTERED_BY_ID# - ID de l'utilisateur qui a créé le document
#ENTERED_BY_NAME# - le nom de l'utilisateur qui a créé le document
#ENTERED_BY_EMAIL# - l'e-mail de l'utilisateur qui a créé le document
#DATE_MODIFY# - date de modification de document
#MODIFIED_BY_ID# - ID de l'utilisateur qui a modifié le document
#MODIFIED_BY_NAME# - le nom de l'utilisateur qui a modifié le document
#FILENAME# - plein nom de dossier
#TITLE# - titre de dossier
#BODY_HTML# - contenus de document dans le format HTML
#BODY_TEXT# - contenus de document dans le format de TEXTE
#BODY# - le contenu de document conservé dans la base de données
#BODY_TYPE# - type de contenus de document
#COMMENTS# - commentaires
";
$MESS ['WF_STATUS_CHANGE_SUBJECT'] = "#SITE_NAME# : le Statut de document # #ID# a été changé";
$MESS ['WF_STATUS_CHANGE_MESSAGE'] = "
Le statut de document # #ID# a été changé à #SITE_NAME#.
---------------------------------------------------------------------------

Maintenant les champs dans le document ont les valeurs suivantes :

Dossier   - #FILENAME#
Titre        - #TITLE#
Statut        - [#STATUS_ID#] #STATUS_TITLE#; précédent - [#PREV_STATUS_ID#] #PREV_STATUS_TITLE#
Créé      - #DATE_ENTER#; [#ENTERED_BY_ID#] #ENTERED_BY_NAME#
Modifié      - #DATE_MODIFY#; [#MODIFIED_BY_ID#] #MODIFIED_BY_NAME#

Contenus (type - #BODY_TYPE#):
---------------------------------------------------------------------------
#BODY_TEXT#
---------------------------------------------------------------------------

Commentaires :
---------------------------------------------------------------------------
#COMMENTS#
---------------------------------------------------------------------------

Pour voir et réviser le document visitent le lien :
http://#SERVER_NAME#/bitrix/admin/workflow_edit.php?lang=fr&ID=#ID#

Message automatiquement produit.
";
$MESS ['WF_NEW_DOCUMENT_NAME'] = "Le nouveau document a été créé";
$MESS ['WF_NEW_DOCUMENT_DESC'] = "
#ID# - ID
#ADMIN_EMAIL# - l'e-mail d'administrateurs de flux de production 
#BCC# - l'e-mail des utilisateurs qui ont déjà modifié le document quelque temps ou qui peuvent modifier cela
#STATUS_ID# - statut ID
#STATUS_TITLE# - titre de statut
#DATE_ENTER# - date de création de document
#ENTERED_BY_ID# - ID de l'utilisateur qui a créé le document
#ENTERED_BY_NAME# - le nom de l'utilisateur qui a créé le document
#ENTERED_BY_EMAIL# - l'e-mail de l'utilisateur qui a créé le document
#FILENAME# - full file name
#TITLE# - file title
#FILENAME# - plein nom de dossier
#TITLE# - titre de dossier
#BODY_HTML# - contenus de document dans le format HTML
#BODY_TEXT# - contenus de document dans le format de TEXTE
#BODY# - le contenu de document conservé dans la base de données
#BODY_TYPE# - type de contenus de document
#COMMENTS# - commentaires
";
$MESS ['WF_NEW_DOCUMENT_SUBJECT'] = "#SITE_NAME# : le nouveau document a été créé";
$MESS ['WF_NEW_DOCUMENT_MESSAGE'] = "
Le nouveau document a été créé à #SITE_NAME#.
---------------------------------------------------------------------------

Maintenant les champs dans le document ont les valeurs suivantes :

ID            - #ID#
Dossier  - #FILENAME#
Titre        - #TITLE#
Statut     - [#STATUS_ID#] #STATUS_TITLE#
Créé        - #DATE_ENTER#; [#ENTERED_BY_ID#] #ENTERED_BY_NAME#

Contenus (type - #BODY_TYPE#):
---------------------------------------------------------------------------
#BODY_TEXT#
---------------------------------------------------------------------------

Commentaires :
---------------------------------------------------------------------------
#COMMENTS#
---------------------------------------------------------------------------

Pour voir et réviser le document visitent le lien :
http://#SERVER_NAME#/bitrix/admin/workflow_edit.php?lang=fr&ID=#ID#

Message automatiquement produit.
";
$MESS ['WF_IBLOCK_STATUS_CHANGE_NAME'] = "Le statut d'élément de bloc d'informations a été changé";
$MESS ['WF_IBLOCK_STATUS_CHANGE_DESC'] = "
#ID# - ID
#IBLOCK_ID# - ID du bloc informationnel
#IBLOCK_TYPE# - type de bloc informationnel
#SECTION_ID# - section ID
#ADMIN_EMAIL# - l'e-mail d'administrateurs de flux de production 
#BCC# - l'e-mail des utilisateurs qui ont déjà modifié le élément quelque temps ou qui peuvent modifier cela 
#PREV_STATUS_ID# - ID de statut précédent du élément
#PREV_STATUS_TITLE# - le nom de statut précédent du élément
#STATUS_ID# - statut ID
#STATUS_TITLE# - titre de statut
#DATE_CREATE#  -date de création d'élément
#CREATED_BY_ID# - ID de l'utilisateur qui a créé l'élément
#CREATED_BY_NAME# - le nom de l'utilisateur qui a créé l'élément
#CREATED_BY_EMAIL# - l'e-mail de l'utilisateur qui a créé l'élément
#DATE_MODIFY# - date de modification d'élément
#MODIFIED_BY_ID# - ID de l'utilisateur qui a modifié l'élément
#MODIFIED_BY_NAME# - le nom de l'utilisateur qui a modifié l'élément
#NAME# - nom de l'élément
#PREVIEW_HTML# - description brève dans le format HTML
#PREVIEW_TEXT# - description brève dans le format de TEXTE
#PREVIEW# - la description brève conservée dans la base de données
#PREVIEW_TYPE# - le type de description bref (le texte | Html)
#DETAIL_HTML# - pleine description dans le format HTML
#DETAIL_TEXT# - pleine description dans le format de TEXTE
#DETAIL# -l a pleine description conservée dans la base de données
#DETAIL_TYPE# - le plein type de description (le texte | Html)
#COMMENTS# - commentaires
";
$MESS ['WF_IBLOCK_STATUS_CHANGE_SUBJECT'] = "#SITE_NAME# : le Statut d'élément # #ID# a été changé (le bloc informationnel # #IBLOCK_ID#; tapez - #IBLOCK_TYPE#)";
$MESS ['WF_IBLOCK_STATUS_CHANGE_MESSAGE'] = "
#SITE_NAME# : le Statut d'élément # #ID# a été changé (le bloc informationnel # #IBLOCK_ID#; tapez - #IBLOCK_TYPE#)
---------------------------------------------------------------------------

Maintenant les champs d'élément ont les valeurs suivantes :

Nom        - #NAME#
Statut       - [#STATUS_ID#] #STATUS_TITLE#; previous - [#PREV_STATUS_ID#] #PREV_STATUS_TITLE#
Créé       - #DATE_CREATE#; [#CREATED_BY_ID#] #CREATED_BY_NAME#
Modifié     - #DATE_MODIFY#; [#MODIFIED_BY_ID#] #MODIFIED_BY_NAME#

Description brève (type - #PREVIEW_TYPE#):
---------------------------------------------------------------------------
#PREVIEW_TEXT#
---------------------------------------------------------------------------

Pleine description (type - #DETAIL_TYPE#):
---------------------------------------------------------------------------
#DETAIL_TEXT#
---------------------------------------------------------------------------

Commentaires :
---------------------------------------------------------------------------
#COMMENTS#
---------------------------------------------------------------------------

Pour voir et réviser le document visitent le lien :
http://#SERVER_NAME#/bitrix/admin/iblock_element_edit.php?lang=fr&WF=Y&PID=#ID#&type=#IBLOCK_TYPE#&IBLOCK_ID=#IBLOCK_ID#&filter_section=#SECTION_ID#

Message automatiquement produit.
";
$MESS ['WF_NEW_IBLOCK_ELEMENT_NAME'] = "Le nouvel élément de bloc d'informations a été créé";
$MESS ['WF_NEW_IBLOCK_ELEMENT_DESC'] = "
#ID# - ID
#IBLOCK_ID# - ID du bloc informationnel
#IBLOCK_TYPE# - type de bloc informationnel
#SECTION_ID# - section ID
#ADMIN_EMAIL# - l'e-mail d'administrateurs de flux de production 
#BCC# - l'e-mail des utilisateurs qui ont déjà modifié le élément quelque temps ou qui peuvent modifier cela 
#STATUS_ID# - statut ID
#STATUS_TITLE# - titre de statut
#DATE_CREATE#  -date de création d'élément
#CREATED_BY_ID# - ID de l'utilisateur qui a créé l'élément
#CREATED_BY_NAME# - le nom de l'utilisateur qui a créé l'élément
#CREATED_BY_EMAIL# - l'e-mail de l'utilisateur qui a créé l'élément
#NAME# - nom de l'élément
#PREVIEW_HTML# - description brève dans le format HTML
#PREVIEW_TEXT# - description brève dans le format de TEXTE
#PREVIEW# - la description brève conservée dans la base de données
#PREVIEW_TYPE# - le type de description bref (le texte | Html)
#DETAIL_HTML# - pleine description dans le format HTML
#DETAIL_TEXT# - pleine description dans le format de TEXTE
#DETAIL# -l a pleine description conservée dans la base de données
#DETAIL_TYPE# - le plein type de description (le texte | Html)
#COMMENTS# - commentaires
";
$MESS ['WF_NEW_IBLOCK_ELEMENT_SUBJECT'] = "#SITE_NAME# : le nouvel élément a été créé (le bloc informationnel # #IBLOCK_ID#; tapez - #IBLOCK_TYPE#)";
$MESS ['WF_NEW_IBLOCK_ELEMENT_MESSAGE'] = "
#SITE_NAME# : le nouvel élément a été créé (le bloc informationnel # #IBLOCK_ID#; tapez - #IBLOCK_TYPE#)
---------------------------------------------------------------------------

Maintenant les champs d'élément ont les valeurs suivantes :

Nom         - #NAME#
Statut       - [#STATUS_ID#] #STATUS_TITLE#
Créé       - #DATE_CREATE#; [#CREATED_BY_ID#] #CREATED_BY_NAME#

Description brève (type - #PREVIEW_TYPE#):
---------------------------------------------------------------------------
#PREVIEW_TEXT#
---------------------------------------------------------------------------

Pleine description (type - #DETAIL_TYPE#):
---------------------------------------------------------------------------
#DETAIL_TEXT#
---------------------------------------------------------------------------

Commentaires :
---------------------------------------------------------------------------
#COMMENTS#
---------------------------------------------------------------------------

Pour voir et réviser le document visitent le lien :
http://#SERVER_NAME#/bitrix/admin/iblock_element_edit.php?lang=fr&WF=Y&PID=#ID#&type=#IBLOCK_TYPE#&IBLOCK_ID=#IBLOCK_ID#&filter_section=#SECTION_ID#

Message automatiquement produit.
";
?>