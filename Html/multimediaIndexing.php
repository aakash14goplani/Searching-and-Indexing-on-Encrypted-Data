<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Multimedia Indexing</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/pluton.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        
        <style>
			h1
			{
				color:#F00;
				padding-top:40;
				padding-bottom:40;
				text-align:center;	
			}
			body
			{color:#000;}
			h2
			{
				color:#F00;
				font-size:24px;
				text-align:center;	
			}
			h3
			{
				color:#000;
				font-size:24px;
				text-align:left;	
			}
			name
			{
				color:#F00;
				font-size:24px;
				text-align:left;
			}
			a
			{
				text-decoration:none;	
			}
			a:link /* unvisited link */
			{
				color: #00F;
			}			
			a:visited /* visited link */
			{
				color: #00F;
			}
			a:hover /* mouse over link */
			{
				color: #F00;
				text-decoration:underline;
			}			
			a:active /* selected link */
			{
				color: #0F0;
			}
			th
			{
				text-align:left;
				font-size:22px;
				color:#F00;
			}
			name
			{
				color:#FFF;
				font-size:20px;
				text-align:left;
			}		
		</style>
    </head>
    
    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
					<mainHeading style="color:#F00; font-size:40px; font-weight:bold;">
                    	<br />
                    	<center>Searching and Indexing over Encrypted Data on Cloud</center>
                        <br />
                    </mainHeading>
                    <?php
                    	session_start();
						echo '<name><br><br>Welcome,  '.$_SESSION["username"].'</name>';
					?>
                                        
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                        	<li class="active"><a href="menu.php">Menu</a></li>
                            <li><a href="mmFileUpload.php">Upload another File</a></li>
                            <li><a href="multimediaIndexReport.php" target="_blank">Generate Report</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <!-- Start home section -->
        <div id="logout">
            <!-- Start cSlider -->
        </div>
        <!-- End home section -->
        <!-- Service section start -->
        
        <!-- Service section end -->
        <!-- Portfolio section start -->
        <div class="section secondary-section " id="portfolio">
            <div class="triangle"></div>
            <div class="container">
                <div class=" title">
                    <h1>Trusted Cloud</h1>
                </div>
                <?php
						
					if($_SERVER["REQUEST_METHOD"] == "POST")
					{		
						function uploadFileContents()
						{
							$uploadFileTimeStart = microtime(true);
							
							$target_dir = "C:\\xampp\htdocs\BEPROJECT\Html\Multimedia/";
							$target_file = $target_dir . basename($_FILES['uploadmedia']['name']);
							$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
							$filename = pathinfo($target_file,PATHINFO_FILENAME);
							
							try 
							{
								// Undefined | Multiple Files | $_FILES Corruption Attack
								if (!isset($_FILES['uploadmedia']['error']) || is_array($_FILES['uploadmedia']['error']))
								{
									throw new RuntimeException('<br>Invalid parameters.');
								}	
								// Check $_FILES['uploadmedia']['error'] value.
								switch ($_FILES['uploadmedia']['error']) 
								{
									case UPLOAD_ERR_OK:
										break;
									case UPLOAD_ERR_NO_FILE:
										throw new RuntimeException('<h2>No file sent.</h2>');
									case UPLOAD_ERR_INI_SIZE:
									case UPLOAD_ERR_FORM_SIZE:
										throw new RuntimeException('<h2>Exceeded filesize limit.</h2>');
									default:
										throw new RuntimeException('<h2>Unknown errors.</h2>');
								}
								// Check if file already exists
								if (file_exists($target_file)) 
								{
									throw new RuntimeException('<h2>File Already Exist in root directory.</h2>');
								}
								// Allow certain file formats
								if( $FileType != "jpg" && $FileType != "jpg" && $FileType != "jpeg" && $FileType != "png" && $FileType != "gif" && $FileType != "tiff" && $FileType != "bmp" && $FileType != "mkv" && $FileType != "mp4" && $FileType != "mp3" && $FileType != "avi" && $FileType != "ogv" && $FileType != "3gp" ) 
								{
									throw new RuntimeException('<h2>Only Image, Audio and Video files Allowed</h2>');
								}
								//obtain safe unique name from its binary data.
								if (!move_uploaded_file($_FILES['uploadmedia']['tmp_name'],$target_file)) 
								{
									throw new RuntimeException('<h2>Failed to move uploaded file.</h2>');
								}	
								echo '<h2>File is uploaded successfully.</h2>';	
							}
							catch (RuntimeException $e) 
							{
								echo $e->getMessage();
							}
							
							$uploadFileTimeEnd = microtime(true);
							$totalTimetoUploadFiles = $uploadFileTimeEnd - $uploadFileTimeStart;
							$_SESSION['uploadFileMM_time'] = $totalTimetoUploadFiles;
							
							readContents($filename, $FileType);
						}
						
						function readContents($filename, $FileType)
						{
							$readFileContentsTimeStart = microtime(true);
							
							$var = $FileType;			
							$myfile = $filename."_".$var.".txt";
							
							//extracting contents of entire mumtimedia
							$actualName = $filename.".".$FileType;
					$fullhandle = fopen("C:\\xampp\htdocs\BEPROJECT\Html\Multimedia/".$actualName, "r") or die("cannot create file!");
							$fullFilesize = filesize("C:\\xampp\htdocs\BEPROJECT\Html\Multimedia/".$actualName);
							$fullContents = fread($fullhandle, $fullFilesize);
							encryptData($fullContents, $actualName);
							
							//extracting contents of text enter while uploading MM
							$contents = $_POST['comment'];
							$handle = fopen("C:\\xampp\htdocs\BEPROJECT\Html\Multimedia/".$myfile, "w") or die("cannot create file!");
							fwrite($handle, $contents);
							$filesize = filesize("C:\\xampp\htdocs\BEPROJECT\Html\Multimedia/".$myfile);
							
							$readFileContentsTimeEnd = microtime(true);
							$totalTimetoReadFiles = $readFileContentsTimeEnd - $readFileContentsTimeStart;
							$_SESSION['readMMFile_time'] = $totalTimetoReadFiles;
							
							$count_words = str_word_count($contents); //for calculating term frequency			
							$words = extractCommonWords($contents, $filesize);	//extracting keywords
							$id = getID($myfile, $filesize); //generating id
							toDatabase($id, $words, $count_words); //inserting to database
							display($myfile, $contents, $filesize); //displaying final contents					
						}
						
						function encryptData($value, $filename)
						{
						   /*vale : original data and filename : to encrypt file*/
							$encryptionStartTime = microtime(true);
						   //AES 128-bit encryption
						   $key = "Mary has one cat";
						   $text = $value;
						   $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
						   $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
						   $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $text, MCRYPT_MODE_ECB, $iv);
						   
						   //storing encrypted data file to folder
						   $cloudStorageStartTime = microtime(true);
						   $newFile = $filename.".encrypt";
						   $file = "C:\Users\AAKASH VASWANI\Dropbox\Apps\untrustedserver/$newFile";
						   file_put_contents($file, $crypttext);
						   $cloudStorageEndTime = microtime(true);
						   $totalTimeForCloudStorage = $cloudStorageEndTime - $cloudStorageStartTime;
						   $_SESSION['cloudUploadMM_time'] = $totalTimeForCloudStorage;
						   
							$encryptionEndTime = microtime(true);
							$totalTimeForEncryption = $encryptionEndTime - $encryptionStartTime;
							$_SESSION['encryptMM_time'] = $totalTimeForEncryption;
						   
						   return $crypttext;
						}
						
						function extractCommonWords($string, $filesize)
						{
							  /*string : contents of text file and filesize : to limit number of keywords generated in each file*/
							   $keywordGenerationStartTime = microtime(true);
							  //generating array for stopwords, total 572 entries!
							  $fp = fopen('stoplist.txt', 'r'); 
							  $stopWords = explode("\n", fread($fp, filesize('stoplist.txt')));
							  
							  /*matches 1 or more spaces at once and replaces them with empty string. matches sequence of one or more whitespace characters and i = case insensitive matching */   
							  $string = preg_replace('/ss+/i', '', $string);
							  
							  // trim the string
							  $string = trim($string); 
							  
							  // only take alphanumerical characters, but keep the spaces and dashes too…
							  $string = preg_replace('/[^a-zA-Z0-9 -]/', '', $string);
							  
							  // make it lowercase
							  $string = strtolower($string); 
						   
							  /*This match is zero-length and hence $matchWords[0] is used. *?/i stands for one or more occurance ignoring case. The word boundary \b matches positions where one side is a word character (usually a letter, digit or underscore—but see below for variations across engines) and the other side is not a word character (for instance, it may be the beginning of the string or a space character).*/
							  preg_match_all('/\b.*?\b/i', $string, $matchWords);
							  $matchWords = $matchWords[0];
						 
							  $totalWords = count($matchWords[0]);
						 
							  foreach ( $matchWords as $key=>$item ) 
							  {
								  //if $item contains stopwords or null character or words with length less than 3, delete them using respective key
								  if ( $item == '' || in_array(strtolower($item), $stopWords) || strlen($item) <= 3 ) 
								  {
									  unset($matchWords[$key]);
								  }
							  }
							  $wordCountArr = array();
							  if ( is_array($matchWords) ) //Finds whether a variable is an array 
							  {
								  foreach ( $matchWords as $key => $val ) 
								  {
									  $val = strtolower($val);
									  if ( isset($wordCountArr[$val]) ) //Determine if a variable is set and is not NULL.
									  {
										  $wordCountArr[$val]++; //update the counter
									  } 
									  else 
									  {
										  $wordCountArr[$val] = 1; //set the value to array and initialize counter
									  }
								  }
							  }
							arsort($wordCountArr); //Sort an array in reverse order ie from z to a
								  
							//counting number of keywords to be displayed
							if($filesize < 30)
								$limit = 6;
							else
								if($filesize > 30 && $filesize < 90)
									$limit = 10;
								else
									$limit = 15;
								  
							$wordCountArr = array_slice($wordCountArr, 0, $limit);
							
							$keywordGenerationEndTime = microtime(true);
							$totalTimeForKeywordGeneration = $keywordGenerationEndTime - $keywordGenerationStartTime;
							$_SESSION['kewordGenerationMM_time'] = $totalTimeForKeywordGeneration;
									
							return $wordCountArr;
						}
						
						function getID($filename, $filesize)
						{
							/*$filename : to check wheather a file is present or not and filesize : required field to enter in encrypted database*/
							$getIdStartTime = microtime(true);
							
							$target_file = basename($_FILES['uploadmedia']['name']);
							$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
							$originalFileSize = filesize("C:\\xampp\htdocs\BEPROJECT\Html\Multimedia/".$target_file);
							
							$connect = mysql_connect("localhost","root","") or die(mysql_error());
							mysql_select_db("be") or die("<br><br>no database found<br><br>");
							
							$query1 = mysql_query(" select * from mmfileindex where file_name = '$filename' ");
							if(mysql_num_rows($query1))
							{
							  //file is already present so skip this.
							} 
							else 
							{
							  //file is not present, so enter it into database
							  $query2 = " insert into mmfileindex (file_name, file_size) values ('".$filename."', ".$filesize.") ";
							  $result = mysql_query($query2) or die("<br>Query Failed inserting to mmfileindex ".mysql_error());
							  
							  $query_m = "insert into multimedia (name, type, size) values ('".$target_file."', '".$FileType."', $originalFileSize)";
							  $result_m = mysql_query($query_m) or die("<br>Query Failed inserting to multimedia ".mysql_error());
							}
								
							$query3 = mysql_query(" select file_id from mmfileindex where file_name = '$filename' ");
							$execute = mysql_fetch_array($query3);
							$id = $execute['file_id'];
							
							/*Prepare the encrypted file index table*/
							if(mysql_num_rows($query1))
							{
							  //file is already present so skip this.
							} 
							else 
							{
							  //file is not present, so enter it into encrypted database
							  $aesKey = "Mary has one cat";
							  $query22 = " insert into mmencryptedfileindex (file_id, file_name, file_size) values (AES_ENCRYPT('".$id."', '".$aesKey."'), AES_ENCRYPT('".$filename."', '".$aesKey."'), AES_ENCRYPT('".$filesize."', '".$aesKey."')) ";
							  $result22 = mysql_query($query22) or die("<br>Query Failed inserting to mmencryptedfileindex ".mysql_error());
							}
							
							$getIdEndTime = microtime(true);
							$totalTimeGetId = $getIdEndTime - $getIdStartTime;
							$_SESSION['getIdDatabaseMM_time'] = $totalTimeGetId;
							
							return $id;
						}
						
						function toDatabase($file_id, $words, $count_words)
						{
							/*file_id : to determine unique id, $words to generate keywords and frequency, count_words : for ranking*/
							$databaseStartTime = microtime(true);
							
							$connect = mysql_connect("localhost","root","") or die(mysql_error());
							mysql_select_db("be") or die("<br><br>no database found<br><br>");
							
							$query1 = mysql_query(" select * from mmkeywordindex where file_id = $file_id ");
							if(mysql_num_rows($query1))
							{
							  //data is already present so skip this.
							} 
							else 
							{
							  //data is not present, so enter it into database
							  $aesKey = "Mary has one cat";
							  foreach ($words as $key => $val) 
							  {
									$term_freq = $val / $count_words; //required for ranking to check how relevant a particular keyword is!
									
									//normal indexing
									$query2 = " insert into mmkeywordindex (file_id, keyword, frequency, term_frequency) values (".$file_id.", '".$key."', ".$val.", ".$term_freq.") ";
									$result = mysql_query($query2) or die("<br>Query Failed inserting to mmkeywordindex ".mysql_error());
									
									//encrypted indexing
									$query22 = " insert into mmencryptedindex (file_id, keyword, frequency, term_frequency) values (AES_ENCRYPT('".$file_id."', '".$aesKey."'), AES_ENCRYPT('".$key."', '".$aesKey."'), AES_ENCRYPT('".$val."', '".$aesKey."'), AES_ENCRYPT('".$term_freq."', '".$aesKey."')) ";
									$result22 = mysql_query($query22) or die("<br>Insert Query Failed inserting to mmencryptedindex ".mysql_error());		
							  }
								
							}
							
							$databaseEndTime = microtime(true);
							$totalDatabaseTime = $databaseEndTime - $databaseStartTime;
							$_SESSION['databaseEntryMM_time'] = $totalDatabaseTime;	
						}
						
						function display($filename, $contents, $filesize)
						{
							$aesKey = "Mary has one cat";
							$displayStartTime = microtime(true);
							/*echo 'FileName = '.$filename.'<br>';
							echo 'FileSize(in bytes) = '.$filesize.'<br><br>';
							echo '<b><center>Original Data uploaded by client:</center></b><br>'.$contents.'<br><br>';*/
							
							$EncryptedData = encryptData($contents, $filename);
							/*echo '<b><center>Encrypted Data stored on Cloud: </center></b><br>'.$EncryptedData.'<br>';
							$DecryptedData = decryptData($EncryptedData, $filename);
							echo '<br><b><center>Decrypted Data reterived by client: </center></b><br>'.$DecryptedData;*/
							
							$connect = mysql_connect("localhost","root","") or die(mysql_error());
							mysql_select_db("be") or die("<br><br>no database found<br><br>");
							
							echo '<br><br>';
							
							/*echo '<b><center>Plain file indexing</b>(for reference only)</center><br>';
							$query1 = " select * from mmfileindex ";
							$result1 = mysql_query($query1) or die("<br>Query Failed selecting from mmfileindex ".mysql_error());
							$numrows1 = mysql_num_rows($result1);			
							if($numrows1 > 0)
							{
								echo "<table border='1' cellspacing='4' cellpadding='4' align='center'>";
								echo "<tr><th>ID</th><th>Name</th><th>Size(in KB)</th></tr>";
								while($rows1 = mysql_fetch_assoc($result1))
								{
										$id = $rows1['file_id'];
										$name = $rows1['file_name'];
										$size = $rows1['file_size'];
										echo "<tr><td>$id</td><td>$name</td><td>$size</td></tr>";	
								}
								echo "</table>";	
							}
							else
								echo "No results found!!!!!";*/
								
							echo '
							<html>
								<head>
									<link rel="stylesheet" type="text/css" href="style.css"></link>
								</head>
								<body>
									<center>
										<br><br><b>Your Access Token</b>(<i>you need to input this token while downloading file</i>!!! : <br>
										<h4 style="color:red">a:2:{s:1:"t";s:16:"hic55718skyllls1";s:1:"s";s:15:"zfz5wtb8giiaq1t";}</h4>
										<a href="downloadAccessToken.php">Download Access Token File</a>
									</center>
								</body>
							</html>
							';
							echo '<br><br>';
							
							echo '<h3><center>Encrypted file indexing</h3></center><br>';
							
							$query11 = " select * from mmencryptedfileindex ";
							$result11 = mysql_query($query11) or die("<br>Query Failed selecting from mmencryptedfileindex ".mysql_error());
							$numrows11 = mysql_num_rows($result11);			
							if($numrows11 > 0)
							{
								echo "<table border='1' cellspacing='4' cellpadding='4' align='center'>";
								echo "<tr><th>ID</th><th>Name</th><th>Size(in KB)</th></tr>";
								while($rows11 = mysql_fetch_assoc($result11))
								{
										$id = $rows11['file_id'];
										$name = $rows11['file_name'];
										$size = $rows11['file_size'];
										echo "<tr><td>$id</td><td>$name</td><td>$size</td></tr>";	
								}
								echo "</table>";	
							}
							else
								echo "No results found!!!!!";
								
							echo '<br><br>';
							
							/*//Decrypting fileindex using aes
							echo '<b><center>Decrypted file indexing</b></center><br>';
							
							$query111 = " select AES_DECRYPT(file_id, '".$aesKey."') as file_id, AES_DECRYPT(file_name, '".$aesKey."') as file_name, AES_DECRYPT(file_size, '".$aesKey."') as file_size from mmencryptedfileindex ";
							$result111 = mysql_query($query111) or die("<br>Query Failed selecting from mmencryptedfileindex ".mysql_error());
							$numrows111 = mysql_num_rows($result111);			
							if($numrows111 > 0)
							{
								echo "<table border='1' cellspacing='4' cellpadding='4' align='center'>";
								echo "<tr><th>ID</th><th>Name</th><th>Size(in KB)</th></tr>";
								while($rows111 = mysql_fetch_assoc($result111))
								{
										$id_decrypt = $rows111['file_id'];
										$name_decrypt = $rows111['file_name'];
										$size_decrypt = $rows111['file_size'];
										echo "<tr><td>$id_decrypt</td><td>$name_decrypt</td><td>$size_decrypt</td></tr>";	
								}
								echo "</table>";	
							}
							else
								echo "No results found!!!!!";*/
								
							echo '<br><br>';
							
							/*echo '<b><center>Plain keyword indexing</b>(for reference only)</center><br>';
							$query2 = " select * from mmkeywordindex ";
							$result2 = mysql_query($query2) or die("<br>Query Failed selecting from mmkeywordindex ".mysql_error());
							$numrows2 = mysql_num_rows($result2);			
							if($numrows2 > 0)
							{
								echo "<table border='1' cellspacing='4' cellpadding='4' align='center'>";
								echo "<tr><th>ID</th><th>Keyword</th><th>Frequency</th><th>Term_Frequency</th></tr>";
								while($rows2 = mysql_fetch_assoc($result2))
								{
										$id = $rows2['file_id'];
										$keyword = $rows2['keyword'];
										$frequency = $rows2['frequency'];
										$term_freq = $rows2['term_frequency'];
										echo "<tr><td>$id</td><td>$keyword</td><td>$frequency</td><td>$term_freq</td></tr>";	
								}
								echo "</table>";	
							}
							else
								echo "No results found!!!!!";*/
								
							echo '<br><br>';
							
							echo '<h3><center>Encrypted keyword indexing</h3></center><br>';
							$query22 = " select * from mmencryptedindex ";
							$result22 = mysql_query($query22) or die("<br>Query Failed selecting from mmencryptedindex ".mysql_error());
							$numrows22 = mysql_num_rows($result22);			
							if($numrows22 > 0)
							{
								echo "<table border='1' cellspacing='4' cellpadding='4' align='center'>";
								echo "<tr><th>ID</th><th>Keyword</th><th>Frequency</th><th>Term_Frequency</th></tr>";
								while($rows22 = mysql_fetch_assoc($result22))
								{
										$id = $rows22['file_id'];
										$keyword = $rows22['keyword'];
										$frequency = $rows22['frequency'];
										$term_freq = $rows22['term_frequency'];
										echo "<tr><td>$id</td><td>$keyword</td><td>$frequency</td><td>$term_freq</td></tr>";	
								}
								echo "</table>";	
							}
							else
								echo "No results found!!!!!";
								
							echo '<br><br>';
							/*//Decrypting keyword index using aes
							echo '<b><center>Decrypted Keyword indexing</b></center><br>';
							
							$query222 = " select AES_DECRYPT(file_id, '".$aesKey."') as file_id, AES_DECRYPT(keyword, '".$aesKey."') as keyword, AES_DECRYPT(frequency, '".$aesKey."') as frequency, AES_DECRYPT(term_frequency, '".$aesKey."') as term_frequency from encryptedindex ";
							$result222 = mysql_query($query222) or die("<br>Query Failed selecting from mmencryptedindex ".mysql_error());
							$numrows222 = mysql_num_rows($result222);			
							if($numrows222 > 0)
							{
								echo "<table border='1' cellspacing='4' cellpadding='4' align='center'>";
								echo "<tr><th>ID</th><th>Keyword</th><th>Frequency</th><th>Term_Frequency</th></tr>";
								while($rows222 = mysql_fetch_assoc($result222))
								{
										$id = $rows222['file_id'];
										$keyword = $rows222['keyword'];
										$frequency = $rows222['frequency'];
										$term_freq = $rows222['term_frequency'];
										echo "<tr><td>$id</td><td>$keyword</td><td>$frequency</td><td>$term_freq</td></tr>";	
								}
								echo "</table>";	
							}
							else
								echo "No results found!!!!!";*/
								
							echo '<br><br>';
							$displayEndTime = microtime(true);
							$totalDisplayTime = $displayEndTime - $displayStartTime;
							$_SESSION['displayMM_time'] = $totalDisplayTime;
					
						}
						
						uploadFileContents();
						/*echo '<br>'.$filename.'<br>'.$_FILES["uploadimage"]["name"].'<br>'.$size['mime'].'<br>'.$size[3].'<br>'.$imgData;
						
						$sql = " INSERT INTO imageindex(image_name, image_type, image_size)
						VALUES('".mysql_real_escape_string($_FILES['uploadimage']['name'])."', '".mysql_real_escape_string($size['mime'])."', '".mysql_real_escape_string($imgData)."', '".$size[3]."') ";
						//echo "<br>".$sql."<br>";
						//$result = mysql_query($sql) or die("<br>error in uploading!<br>".mysql_error());*/
					}
				?>
            </div>
        </div>
        <!-- Portfolio section end -->
        <!-- About us section start -->
        <div class="section primary-section" id="about">
            <div class="triangle">
            </div>
            <div class="container">
            </div>
        </div>
        
        <!-- Footer section start -->
        <div class="footer">
            <p>&copy; 2014-2015 All Rights Reserved</p>
        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>
        <!-- ScrollUp button end -->
        <!-- Include javascript -->
        <script type="text/javascript" src="ajax.js"></script>
		
		<script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="js/jquery.cslider.js"></script>
        <script type="text/javascript" src="js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="js/jquery.inview.js"></script>
        <!-- Load google maps api and call initializeMap function defined in app.js -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;callback=initializeMap"></script>
        <!-- css3-mediaqueries.js for IE8 or older -->
        <!--[if lt IE 9]>
            <script src="js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="js/app.js"></script>
    </body>
</html>