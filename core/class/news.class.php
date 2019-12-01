<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *   file                 :  news.class.php
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *   author               :  Muhamed Skoko - mskoko.me@gmail.com
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */


class News {

	public function Posts() {
		global $DataBase;

		$DataBase->Query("SELECT * FROM `news` WHERE `Status` = '1' ORDER By id DESC");
		$DataBase->Execute();

		return $DataBase->ResultSet();
	}
	
	public function NewsByID($blogID) {
		global $DataBase;

		$DataBase->Query("SELECT * FROM `news` WHERE `id` = :blogID");
		$DataBase->Bind(':blogID', $blogID);
		$DataBase->Execute();

		return $DataBase->Single();
	}

	public function addNewPost($Title, $Text, $Location, $Tags, $Image, $userID) {
		global $DataBase;

		$DataBase->Query("INSERT INTO `news` (`id`, `Title`, `Text`, `Location`, `Tags`, `Image`, `userID`, `Date`, `Status`) VALUES (NULL, :Title, :Text, :Location, :Tags, :Image, :userID, :Date, '1');");
		$DataBase->Bind(':Title', $Title);
		$DataBase->Bind(':Text', $Text);
		$DataBase->Bind(':Location', $Location);
		$DataBase->Bind(':Tags', $Tags);
		$DataBase->Bind(':Image', $Image);
		$DataBase->Bind(':userID', $userID);
		$DataBase->Bind(':Date', date('d/m/Y, H:ia'));

		return $DataBase->Execute();
	}

	public function EditPostByID($Title, $Text, $Location, $Tags, $Image, $postID) {
		global $DataBase;

		$DataBase->Query("UPDATE `news` SET `Title` = :Title, `Text` = :Text, `Location` = :Location, `Tags` = :Tags, `Image` = :Image WHERE `id` = :postID;");
		$DataBase->Bind(':Title', $Title);
		$DataBase->Bind(':Text', $Text);
		$DataBase->Bind(':Location', $Location);
		$DataBase->Bind(':Tags', $Tags);
		$DataBase->Bind(':Image', $Image);
		$DataBase->Bind(':postID', $postID);

		return $DataBase->Execute();
	}

	public function PostDelete($postID) {
		global $DataBase;

		$DataBase->Query("UPDATE `news` SET `Status` = '0' WHERE `id` = :postID;");
		$DataBase->Bind(':postID', $postID);

		return $DataBase->Execute();
	}

}