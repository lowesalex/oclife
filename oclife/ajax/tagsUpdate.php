<?php
OCP\JSON::checkLoggedIn();
OCP\JSON::checkAppEnabled('oclife');

$op = filter_input(INPUT_POST, 'op', FILTER_SANITIZE_STRING);
$fileID = filter_input(INPUT_POST, 'fileID', FILTER_SANITIZE_NUMBER_INT);
$tagID = filter_input(INPUT_POST, 'tagID', FILTER_SANITIZE_NUMBER_INT);
$tagIDString = filter_input(INPUT_POST, 'tagID', FILTER_SANITIZE_STRING);
$tagName = filter_input(INPUT_POST, 'tagName', FILTER_SANITIZE_STRING);

//error_log(sprintf("tagsUpdate.php - Op: %s, fileID: %d, tagID: %d == ", $op, $fileID, $tagID));

switch($op) {
    case 'add': {
        $result = OCA\OCLife\hTags::addTagForFile($fileID, $tagID);
        break;
    }
    
    case 'remove': {
        $result = OCA\OCLife\hTags::removeTagForFile($fileID, $tagID);
        break;
    }
}

die($result);