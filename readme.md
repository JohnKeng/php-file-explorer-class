FileExplorer
============

Table of Contents
-----------------

1.  [Description](#a)
2.  [Features](#b)
3.  [Install script](#c)
4.  [Methods](#d)
5.  [Method return](#e)

A. Description
--------------

如果您已經在PHP 中使用過檔案和目錄，那麼您就會知道預設的複製、刪除（取消連結）函數可以在檔案上使用，但是當您想要刪除或複製其中包含內容的目錄時，那就完全是另一回事了。此類別可讓您輕鬆刪除、建立、移動、複製包含內容的檔案和目錄。

B. Features
-----------

*   Copy files and folders  
    
*   Move files and folders  
    
*   Delete files and folders  
    
*   Create files and folders  
    
*   Read and write a file  
    
*   Listing the content of a directory  
    
*   Get file extension  
    

C. Install script
-----------------

使用這個 class, 您只需將其包含在 PHP 程式碼中即可。  
例如:
```php
include("File.php");  
```

D. Methods
----------

Below you find a list of methods and how you can use them.

**Select Path**

使用 setpath 方法，您可以選擇要對其執行操作的目錄或檔案的路徑。  
例如，如果您想要對 c:/test/example.txt 執行操作，那麼您可以使用以下程式碼：

```php
include("File.php");  
$File = new Explorer();  
$File->SetPath('/Users/johnkeng/Desktop/test.txt');
```

或者，如果您想要對特定目錄執行操作：

```php
include("File.php");  
$File = new Explorer();  
$File->SetPath('/Users/johnkeng/Desktop/');
// $File->SetPath('c:/test/example.txt');   Windows path
```

**Write to a file**

如果要將內容寫入文件。
```php
include("File.php");  
$File = new Explorer();  
$File->SetPath('/Users/johnkeng/Desktop/test.txt');
$File->Write('hello world');
```

執行此腳本後，test.txt 的內容將為「hello world」。

如果目錄路徑沒有該檔案便會新增檔案。

**Read from a file**

使用 read 方法，您可以從文件中取得內容。

```php
include("File.php");  
$File = new Explorer();  
$File->SetPath('/Users/johnkeng/Desktop/');
$content = $File->Read();  
echo $content;
```

**Create directory or file**

使用此方法您可以建立目錄和檔案。此方法的優點是，如果父目錄不存在，它也會建立父目錄。

此方法有 2 個參數。如果要建立目錄，第一個參數必須設定為 true。預設此參數設定為 false。如果要覆蓋已存在的文件，可以將第二個參數設為 true。預設這個參數也是 false。

例如，如果我們要建立一個目錄 /Users/johnkeng/Desktop/a/project。但也沒有測試的目錄 a 。然後這個方法會自動建立 a 和 project 目錄。
```php
include("File.php");  
$File = new Explorer();  
$File->SetPath('/Users/johnkeng/Desktop/a/project');
$File->Create(true);

// 改變目錄的權限 必須更改資料夾權限後續才能操作。
chmod('/Users/johnkeng/Desktop/a', 0744);
```

參數為 true，因為在本例中我們要建立一個目錄。

  

如果你想創建一個文件，它看起來像這樣。
```php
include("File.php");  
$File = new Explorer();  
$File->SetPath('/Users/johnkeng/Desktop/a/project/hi.txt');  
$File->Create();  
```
**Delete**

這將刪除目錄和檔案。它非常容易使用。您可以使用 SetPath 選擇一個目錄或文件，然後呼叫 Delete 方法。
```php
include("File.php");  
$File = new Explorer();  
$File->SetPath('/Users/johnkeng/Desktop/a/project/hi.txt'); 
$File->Delete();  
```

如果它是一個目錄，那麼所有內容也會自動刪除。

**Copy**

複製目錄或檔案。此方法有一個參數，即要將檔案或目錄複製到的目錄或檔案名稱。
```php
include("File.php");  
$File = new Explorer();  
$File->SetPath('/Users/johnkeng/Desktop/test.txt');
$File->Copy('/Users/johnkeng/Desktop/test2.txt');
```

**Move**

移動目錄或檔案。此方法有一個參數，即要將檔案或目錄移至的目錄或檔案名稱。
```php
include("File.php");  
$File = new Explorer();  
$File->SetPath('/Users/johnkeng/Desktop/test.txt');
$File->Move('/Users/johnkeng/Desktop/a/test.txt');  
```

您也可以使用此移動功能作為目錄和檔案重新命名器。

**Listing**

如果選擇了目錄，此方法將傳回該目錄中的檔案和目錄的清單。此方法有4個可選參數：

*   **$exclude\_extension=array():** 要從結果中排除的副檔名陣列。例如: array("jpg")
*   **$exclude\_file=array():** 要從結果排除的檔案陣列。例如: array("Thumb.db")
*   **$exclude\_dir=array():** 要從結果中排除的目錄陣列。例如: array("backup", "temp")
*   **$recursive=true:** 如果還想列出子目錄的內容，則設定為 true。預設為 false。

```php
include("File.php");  
$File = new Explorer();  
$File->SetPath('c:/test/sitebase');  
$array = $File->Listing();  
print\_r($array);
```
這是從列表方法傳回的數組的範例：
```php

 Array
(
    [0] => Array
        (
            [extension] => DS_Store
            [type] => file
            [path] => /Users/johnkeng/Desktop/wavedoc/
            [filename] => .DS_Store
            [fullpath] => /Users/johnkeng/Desktop/wavedoc/.DS_Store
        )

    [1] => Array
        (
            [type] => dir
            [path] => /Users/johnkeng/Desktop/wavedoc/
            [fullpath] => /Users/johnkeng/Desktop/wavedoc/20231116
        )

    [2] => Array
        (
            [extension] => DS_Store
            [type] => file
            [path] => /Users/johnkeng/Desktop/wavedoc/20231116/
            [filename] => .DS_Store
            [fullpath] => /Users/johnkeng/Desktop/wavedoc/20231116/.DS_Store
        )
)
    
```

正如您所看到的，它包含的資訊不僅僅是檔案名稱。

**Extension**

如果選擇了文件，則會取得副檔名。
```php
include("File.php");  
$File = new Explorer();  
$File->SetPath('/Users/johnkeng/Desktop/test.txt');  
$extension = $File->Extension();  
```

E. Method return
----------------

如果操作成功完成，則 write、copy、delete 和 move 方法將傳回 true，否則傳回 false。