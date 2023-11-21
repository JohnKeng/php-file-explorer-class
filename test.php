<?php   

    // 在程式碼的最上方定義一個變數來存儲常用的路徑
    $basePath = '/Users/johnkeng/Desktop/';

    // 引入檔案類別
    include("./File.php");

    // 新增檔案並寫入內容  
    $createFile = new Explorer();
    $createFile->SetPath($basePath . 'test.txt');
    $createFile->Write('hello world');

    // 讀取檔案內容並輸出
    $readFile = new Explorer();  
    $readFile->SetPath($basePath . 'test.txt');
    $content = $readFile->Read();  
    // echo $content;

    // 複製檔案並更改檔名
    $copyFile = new Explorer();
    $copyFile->SetPath($basePath . 'test.txt');
    $copyFile->Copy($basePath . 'test2.txt');

    // 刪除檔案
    $deleteFile = new Explorer();
    $deleteFile->SetPath($basePath . 'test2.txt');
    // $deleteFile->Delete();

    // 新建資料夾
    $createFolder = new Explorer();
    $createFolder->SetPath($basePath . 'a');
    $createFolder->Create(true);   

    // 改變目錄的權限
    chmod($basePath . 'a', 0744);

    // 移動檔案
    $moveFile = new Explorer();
    $moveFile->SetPath($basePath . 'test2.txt');
    $moveFile->Move($basePath . 'a/test.txt');

    // Listing
    $list = new Explorer();
    $list->SetPath($basePath . 'wavedoc');
    $array = $list->Listing(
        Array('txt'),Array('.DS_Store'),Array(),true
    );
    // print_r($array);


    // 副檔名
    $exFile = new Explorer();
    $exFile->SetPath($basePath . 'test.txt');
    $extension = $exFile->Extension();
    // echo $extension;

?>