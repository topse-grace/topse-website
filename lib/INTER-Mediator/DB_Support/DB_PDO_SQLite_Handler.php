<?php

/**
 * INTER-Mediator
 * Copyright (c) INTER-Mediator Directive Committee (http://inter-mediator.org)
 * This project started at the end of 2009 by Masayuki Nii msyk@msyk.net.
 *
 * INTER-Mediator is supplied under MIT License.
 * Please see the full license for details:
 * https://github.com/INTER-Mediator/INTER-Mediator/blob/master/dist-docs/License.txt
 *
 * @copyright     Copyright (c) INTER-Mediator Directive Committee (http://inter-mediator.org)
 * @link          https://inter-mediator.com/
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

class DB_PDO_SQLite_Handler extends DB_PDO_Handler
{
    public function sqlSELECTCommand()
    {
        return "SELECT ";
    }

    public function sqlDELETECommand()
    {
        return "DELETE ";
    }

    public function sqlUPDATECommand()
    {
        return "UPDATE ";
    }

    public function sqlINSERTCommand()
    {
        return "INSERT INTO ";
    }

    public function sqlSETClause($setColumnNames, $keyField, $setValues)
    {
        return (count($setColumnNames) == 0) ? "DEFAULT VALUES" :
            '(' . implode(',', $setColumnNames) . ') VALUES(' . implode(',', $setValues) . ')';
    }

    public function getNullableNumericFields($tableName)
    {
        try {
            $result = $this->getTableInfo($tableName);
        } catch (Exception $ex) {
            throw $ex;
        }
        $fieldNameForField = 'name';
        $fieldNameForNullable = 'notnull';
        $fieldNameForType = 'type';
        $fieldArray = array();
        $numericFieldTypes = array('integer', 'real', 'numeric',
            'tinyint', 'smallint', 'mediumint', 'bigint', 'unsigned big int', 'int2','int8',
            'double', 'double precision', 'float', 'decimal','boolean','date','datetime',);
        $matches = array();
        foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {
            preg_match("/[a-z ]+/", strtolower($row[$fieldNameForType]), $matches);
            if (! $row[$fieldNameForNullable] &&
                in_array($matches[0], $numericFieldTypes)
            ) {
                $fieldArray[] = $row[$fieldNameForField];
            }
        }
        return $fieldArray;
    }

    private $tableInfo = array();

    protected function getTableInfo($tableName)
    {
        if (! isset($this->tableInfo[$tableName])) {
            $sql = "PRAGMA table_info({$tableName})";
            $this->dbClassObj->logger->setDebugMessage($sql);
            $result = $this->dbClassObj->link->query($sql);
            if (!$result) {
                throw new Exception('INSERT Error:' . $sql);
            }
        } else {
            $result = $this->tableInfo[$tableName];
        }
        return $result;
    }
    /*
      sqlite> PRAGMA table_info(person);
      cid         name        type        notnull     dflt_value  pk
      ----------  ----------  ----------  ----------  ----------  ----------
      0           id          INTEGER     0                       1
      1           name        TEXT        0                       0
      2           address     TEXT        0                       0
      3           mail        TEXT        0                       0
      4           category    INTEGER     0                       0
      5           checking    INTEGER     0                       0
      6           location    INTEGER     0                       0
      7           memo        TEXT        0                       0
       */

    protected function getFieldListsForCopy($tableName, $keyField, $assocField, $assocValue, $defaultValues)
    {
        try {
            $result = $this->getTableInfo($tableName);
        } catch (Exception $ex) {
            throw $ex;
        }
        $fieldArray = array();
        $listArray = array();
        foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {
            if ($keyField === $row['name'] || !is_null($row['dflt_value'])) {

            } else if ($assocField === $row['name']) {
                $fieldArray[] = $this->quotedEntityName($row['name']);
                $listArray[] = $this->dbClassObj->link->quote($assocValue);
            } else if (isset($defaultValues[$row['name']])) {
                $fieldArray[] = $this->quotedEntityName($row['name']);
                $listArray[] = $this->dbClassObj->link->quote($defaultValues[$row['name']]);
            } else {
                $fieldArray[] = $this->quotedEntityName($row['name']);
                $listArray[] = $this->quotedEntityName($row['name']);
            }
        }
        return array(implode(',', $fieldArray), implode(',', $listArray));
    }

    public function isPossibleOperator($operator)
    {
        return !(FALSE === array_search(strtoupper($operator), array(
                '||',
                '*', '/', '%',
                '+', '-',
                '<<', '>>', '&', '|',
                '<', '<=', '>', '>=',
                '=', '==', '!=', '<>', 'IS', 'IS NOT', 'IN', 'LIKE', 'GLOB', 'MATCH', 'REGEXP',
                'AND',
                'IS NULL', //NULL value test
                'OR',
                'IN',
                '-', '+', '~', 'NOT',
            )));
    }

    public function isPossibleOrderSpecifier($specifier)
    {
        return !(array_search(strtoupper($specifier), array('ASC', 'DESC')) === FALSE);
    }

    public function quotedEntityName($entityName)
    {
        $q = '"';
        if (strpos($entityName, ".") !== false) {
            $components = explode(".", $entityName);
            $quotedName = array();
            foreach ($components as $item) {
                $quotedName[] = $q . str_replace($q, $q . $q, $item) . $q;
            }
            return implode(".", $quotedName);
        }
        return $q . str_replace($q, $q . $q, $entityName) . $q;

    }

    public function optionalOperationInSetup()
    {
    }

}
