<?php
    class VideoDetailsFormProvider{
        private $con;
        public function __construct($con) {
            $this->con=$con;
        }

    public function createUploadForm() {
        $fileInput = $this->createFileInput();
        $titleInput = $this->createTitleInput();
        $descriptionInput = $this->createDescriptionInput();
        $privacyInput = $this->createPrivacyInput();
        $categoriesInput = $this->createCategoriesInput();
        $uploadButton = $this->createUploadButton();
        return "<form action='processing.php' method='POST' enctype='multipart/form-data'>
                    $fileInput
                    $titleInput
                    $descriptionInput
                    $privacyInput
                    $categoriesInput
                    $uploadButton
                </form>";
    }

    private function createFileInput() {

        return "<div class='form-group'>
                    <label for='exampleFormControlFile1'>Your file</label>
                    <input type='file' class='form-control-file' id='exampleFormControlFile1' name='fileInput' required>
                </div>";
    }

    private function createTitleInput() {
        return "<div class='form-group'>
                    <input class='form-control' type='text' placeholder='Title' name='titleInput'>
                </div>";
    }

    private function createDescriptionInput() {
        return "<div class='form-group'>
                    <textarea class='form-control' placeholder='Description' name='descriptionInput' rows='3'></textarea>
                </div>";
    }

    private function createPrivacyInput() {
        return "<div class='form-group'>
                    <select class='form-control' name='privacyInput'>
                        <option value='0'>Private</option>
                        <option value='1'>Public</option>
                    </select>
                </div>";
    }

    private function createCategoriesInput() {
        $query = $this->con->prepare("SELECT * FROM categories");    
        $query->execute();
        
        $html = "<div class='form-group'>
                    <select class='form-control' name='categoryInput'>";

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $id = $row["id"];
            $name = $row["name"];

            $html .= "<option value='$id'>$name</option>";
        }
        
        $html .= "</select>
                </div>";

        return $html;

    }

    private function createUploadButton() {
        return "<button type='submit' class='btn btn-primary' name='uploadButton'>Upload</button>";
    }
        /*public function CreateUploadForm() {
            $file= $this->fileinput();
            $title= $this->titleinput();
            $desc= $this->descriptioninput();
            $privacy= $this->privacyinput();
            $categories= $this->categoriesinput();
            $upload= $this->uploadbutton();//ab gaur se pdho GET method zyada secure hota hai
            // ye toh pta hi hai tumhe lekin isliye nhi use kr rhe kyunki POST method use krke hi file input hoti hais 
            // yani $_FILES sirf POST method ke saath hi valid hota hai
            return "<form action='processing.php' method='POST'  enctype='multipart/form-data'>"
            . "$file$title$desc$privacy$categories$upload"
                    . "</form>";
        }
        private function fileinput() {
            return  "<div class='form-group'>
    <label for='exampleFormControlFile1'>Your File</label>
    <input type='file' class='form-control-file'id='exampleFormControlFile1' name='fileInput'>
  </div>";
        }
        private function titleinput() {
            return '<div class="form-group">
    <input type="text" class="form-control" placeholder="Title" name="titleInput">
  </div>';
        }
        private function descriptioninput() {
            return "<div class='form-group'>
    <textarea class='form-control' placeholder='Description' name='descriptionInput' rows='3'></textarea>
  </div>";
        }
        private function privacyinput() {
            return "<div class='form-group'><select class='form-control' name='privacyInput'>
      <option value='0'>Private</option>
      <option value='1'>Public</option>
    </select></div>";
        }
        private function categoriesinput() {
            $query= $this->con->prepare("SELECT * FROM categories");//prepare tells which query wil we use
            $query->execute();
            $html="<div class='form-group'>"
                    . "<select class='form-control' name='categoryInput'>";
            while($row=$query->fetch(PDO::FETCH_ASSOC)){
                $id=$row["id"];
                $name=$row["name"];
                $html .="<option value='$id'>$name</option>";
         }
         $html .="</select></div>";
         return $html;
        }
        private function uploadbutton() {
            return "<button type='submit' class='btn btn-primary' name=uploadButton>Upload</button>";
        }*/
    }

