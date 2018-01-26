<?php

/**
 * Created by PhpStorm.
 * User: msyk
 * Date: 14/12/29
 * Time: 12:27
 */
class PageFragments extends DB_UseSharedObjects
    implements Extending_Interface_AfterRead, Extending_Interface_AfterRead_WithNavigation
{
    private $resultCount;

    function doAfterReadFromDB($result)
    {
        $dataSourceName = $this->dbSettings->getDataSourceName();
        $lang = $this->dbSettings->getCriteriaValue("language");
        if ($lang !== 'ja') {
            $lang = 'en';
        }
        if ($dataSourceName == "pagebuilder") {
            $apending = array(
                "pagenavigation" => $this->fileContents("{$lang}/pagenavigation.html"),
                "pageheader" => $this->fileContents("{$lang}/pageheader.html"),
                "pagefooter" => $this->fileContents("{$lang}/pagefooter.html")
            );
//            $this->dbClass->setUpdatedRecord("pagenavigation", $apending["pagenavigation"]);
//            $this->dbClass->setUpdatedRecord("pageheader", $apending["pageheader"]);
//            $this->dbClass->setUpdatedRecord("pagefooter", $apending["pagefooter"]);
            return array($apending);
        } else if ($dataSourceName == "newslist") {
            $this->resultCount = 0;
            $newsList = array();
            $dom = new DOMDocument;
            $dom->recover = true;
            $dom->strictErrorChecking = false;
            libxml_use_internal_errors(true);
            $handle = curl_init();
            curl_setopt($handle, CURLOPT_HEADER, 0);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
            $uri = isset($_SERVER["SCRIPT_URI"]) ? $_SERVER["SCRIPT_URI"] : "http://www.topse.jp/ja/news.html";
            $urlHost = (strlen($uri) > 8) ? substr($uri, 0, strpos($uri, "/", 8)) : "http://www.topse.jp";
            curl_setopt($handle, CURLOPT_URL, $urlHost . (($lang === 'ja') ? "/ja" : "/en") . "/news.html");
            $response = curl_exec($handle);
            curl_close($handle);
            $dom->loadHTML($response);
            libxml_clear_errors();
            $xpath = new DOMXpath($dom);
            $result = $xpath->query('//li');
            for ($i = 0; $i < $result->length; $i++) {
                $node = $result->item($i);
                if ($node->textContent != "\n" && strpos($node->getAttribute('class'), 'top3') !== false) {
                    $newDom = new DOMDocument;
                    foreach ($node->childNodes as $childNode) {
                        $newDom->appendChild($newDom->importNode($childNode, true));
                    }
                    $newsList[] = array('newsitem' => $newDom->saveHTML());
                    $this->resultCount++;
                }
            }
            return $newsList;
        }
        return array(array());
    }

    function countQueryResult()
    {
        $dataSourceName = $this->dbSettings->getDataSourceName();
        if ($dataSourceName == "pagebuilder") {
            return 1;
        } else if ($dataSourceName == "newslist") {
            return $this->resultCount;
        }
        return 0;
    }

    function getTotalCount()
    {
        $this->countQueryResult();
    }

    function fileContents($filename)
    {
        $dom = new DOMDocument;
        $dom->recover = true;
        $dom->strictErrorChecking = false;
        libxml_use_internal_errors(true);
        $fContent = mb_convert_encoding(file_get_contents($filename), 'HTML-ENTITIES', 'UTF-8');
        $loadStatus = $dom->loadHTML($fContent);
        if (!$loadStatus) {
            return null;
        } else {
            $xpath = new DOMXpath($dom);
            $nodeList = $xpath->query('body/*');
            $newDom = new DOMDocument;
            for ($i = 0; $i < $nodeList->length; $i++) {
                $node = $nodeList->item($i);
                if ($node->textContent != "\n") {
                    $newDom->appendChild($newDom->importNode($node, true));
                }
            }
            return $newDom->saveHTML();
        }
    }
}
