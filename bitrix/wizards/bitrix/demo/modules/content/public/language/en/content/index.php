<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Content");?>

<p>You can take an advantage of the <b>Information Blocks</b> module to display
and manage structured information.</p>

<p>You can use information blocks to create:</p>

<ul>
	<li>news sections;
	<li>articles;
	<li>product catalogs;
	<li>photo galleries;
	<li>job lists;
	<li>billboards;
	<li>link catalogs;
	<li>FAQ pools;
	<li>commercial catalogs etc.</li>
</ul>

<p>Information blocks offer a convenient way to store frequently updated
information. Information blocks make adding and updating information easier
owing to structured storage as well as data import and export functions.</p>

<p>The following notions form the information blocks infrastructure:</p>

<ul>
	<li>information block types;
	<li>information blocks;
	<li>information block sections;
	<li>information block elements.</li>
</ul>

<p><b>Information</b><b> block types </b>(e.g. Catalog, Disctionary, Jobs, News,
Photos) are used to group information blocks. Information blocks of the same
type are usually devoted to a common subject and have similar structure. For
example, information blocks <b>Company News</b>, <b>New Arrivals </b>and <b>Partner
News </b>can be of a single type: <b>News</b>.</p>

<p><b>Information</b><b> blocks</b> represent structures of heterogeneous
information. For example: blocks «Phones», «Partner News», «Product News»
etc. Depending on parameters of the type to which the information block belongs,
it can contain sections and subsections (i.e. it can have tree structure).</p>

<p><b>Sections</b> are logical units used to group elements inside an information
block. Sections can form the hierarchical information storage structure. Names
of information block sections (<b>Group</b>, <b>Section</b>, <b>Type</b> etc.)
are defined when creating the information block type to which they refer.</p>

<p><b>Information</b><b> block elements</b> contain stored information. For
example: news, product, photo, vacancy, dictionary entry etc.</p>

<p>The example that you can find in the <b>Content</b> section (<b>/content/</b>)
uses the following information block types:</p>

<ul>
	<li>News;
	<li>Publications;
	<li>Photo Gallery;
	<li>Services.</li>
</ul>

<p>The <b>News</b> section (<i>/content/news/</i>) displays the contents of the <b>e-Store
News</b> information block using the <b>News Section </b>composite component.</p>

<p>The <b>Articles</b> section (<i>/content/articles/</i>) elements of the <b>Articles</b>
information block.</p>

<p>The <b>Photo Gallery</b> section contains two subsections: <b>CeBit</b> and <strong>Modern
Education</strong>. The <b>Photo Gallery</b> elements are displayed using the <b>Full
Photo Gallery </b>composite component.</p>

<p>The <b>Link Directory</b> page displays the contents of the <b>Link Directory</b> information block using the <b>Full Catalog</b> composite component. The same component is used to publish the <b>Classifieds</b>.</p>

<p>The <b>Video and Audio</b> section features a <b>Video Library</b> and a <b>Media Player</b> that allows you to play and organize your videos and music files.        </p>

<p>The <b>Users Galleries</b> section displays photos and images uploaded by all users. The integrated multiuser <b>Photogallery 2.0</b> component will make it easier for you to organize photos and images the way you want. </p>

<p>The <b>Classifieds</b> section shows ads grouped by categories and displayed in a tree-like structure. A new ad can be easily submitted by adding a new element into the corresponding information block.</p>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
