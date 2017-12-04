<?php

/**
 * Short description for PhpExcelComponent
 *
 * PHP version 5.6
 *
 * @category  PhpExcelComponent
 * @package   App\Controller\Component
 * @author    hoannv
 * @copyright 2017
 * @license    License 1.0
 * @date      May 11, 2017 2:45:53 PM
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Cell;
use PHPExcel_Worksheet;
use PHPExcel_Style;

class PhpExcelComponent extends Component
{

    /**
     * Instance of PHPExcel class
     *
     * @var PHPExcel
     */
    protected $_xls;

    /**
     * Pointer to current row
     *
     * @var int
     */
    protected $_row = 1;

    /**
     * Internal table params
     *
     * @var array
     */
    protected $_tableParams;

    /**
     * Number of rows
     *
     * @var int
     */
    protected $_maxRow = 0;

    /**
     * Number of rows table
     *
     * @var int
     */
    protected $_maxRowTable = 0;

    /**
     * Min number of column table
     *
     * @var int
     */
    protected $_minColumnTable = 0;

    /**
     * Max number of column table
     *
     * @var int
     */
    protected $_maxColumnTable = 0;

    /**
     * Create new worksheet or load it from existing file
     *
     * @return $this for method chaining
     */
    public function createWorksheet()
    {
        // load vendor classes
        $this->_xls = new PHPExcel();
        $this->_row = 1;
        return $this;
    }

    /**
     * Create new worksheet from existing file
     *
     * @param string $file path to excel file to load
     *
     * @return PhpExcelComponent
     */
    public function loadWorksheet($file)
    {
        // load vendor classes
        $this->_xls = PHPExcel_IOFactory::load($file);
        $this->setActiveSheet(0);
        $this->_row = 1;
        return $this;
    }

    /**
     * Add sheet
     *
     * @param string $name sheet name
     *
     * @return $this for method chaining
     */
    public function copySheet($sheet, $sheetName)
    {
        $newSheet = $sheet->copy();
        $newSheet->setTitle($sheetName);
        $this->_xls->addSheet($newSheet);

        return $newSheet;
    }

    /**
     * Add sheet
     *
     * @param string $name sheet name
     *
     * @return $this for method chaining
     */
    public function addSheet($name)
    {
        $index = $this->_xls->getSheetCount();
        $this->_xls->createSheet($index)
            ->setTitle($name);
        $this->setActiveSheet($index);
        return $this;
    }

    /**
     * Set active sheet
     *
     * @param int $sheet sheet
     *
     * @return $this for method chaining
     * @throws \PHPExcel_Exception
     */
    public function setActiveSheet($sheet)
    {
        $this->_maxRow = $this->_xls->setActiveSheetIndex($sheet)->getHighestRow();
        $this->_row = 1;
        return $this;
    }

    /**
     * Set worksheet name
     *
     * @param string $name name
     *
     * @return $this for method chaining
     * @throws \PHPExcel_Exception
     */
    public function setSheetName($name)
    {
        $this->_xls->getActiveSheet()->setTitle($name);
        return $this;
    }

    /**
     * Overloaded __call
     * Move call to PHPExcel instance
     *
     * @param string $name function name
     * @param array $arguments arguments
     *
     * @return the return value of the call
     */
    public function __call($name, $arguments)
    {
        return call_user_func_array(array($this->_xls, $name), $arguments);
    }

    /**
     * Set default font
     *
     * @param string $name font name
     * @param int $size font size
     *
     * @return $this for method chaining
     */
    public function setDefaultFont($name, $size)
    {
        $this->_xls->getDefaultStyle()->getFont()->setName($name);
        $this->_xls->getDefaultStyle()->getFont()->setSize($size);
        return $this;
    }

    /**
     * Set row pointer
     *
     * @param int $row number of row
     *
     * @return $this for method chaining
     */
    public function setRowTable($row)
    {
        $this->_maxRowTable = (int)$row;
        return $this;
    }

    /**
     * Set min column pointer
     *
     * @param int $row number of row
     *
     * @return $this for method chaining
     */
    public function setMinColumnTable($column)
    {
        $this->_minColumnTable = (int)$column;
        return $this;
    }

    /**
     * Set max column pointer
     *
     * @param int $row number of row
     *
     * @return $this for method chaining
     */
    public function setMaxColumnTable($column)
    {
        $this->_maxColumnTable = (int)$column;
        return $this;
    }

    /**
     * Set row pointer
     *
     * @param int $row number of row
     *
     * @return $this for method chaining
     */
    public function setRow($row)
    {
        $this->_row = (int)$row;
        return $this;
    }

    /**
     * Get row pointer
     *
     *
     * @return int int
     */
    public function getRow()
    {
        return $this->_row;
    }

    /**
     * Start table - insert table header and set table params
     *
     * @param array $data data with format:
     *                      label   -   table heading
     *                      width   -   numeric (leave empty for "auto" width)
     *                      filter  -   true to set excel filter for column
     *                      wrap    -   true to wrap text in column
     * @param array $params table parameters with format:
     *                      offset  -   column offset (numeric or text)
     *                      font    -   font name of the header text
     *                      size    -   font size of the header text
     *                      bold    -   true for bold header text
     *                      italic  -   true for italic header text
     *
     * @return $this for method chaining
     * @throws \PHPExcel_Exception
     */
    public function addTableHeader($data, $params = array())
    {
        // offset
        $offset = 0;
        if (isset($params['offset'])) {
            $offset = is_numeric($params['offset']) ? (int)$params['offset'] : PHPExcel_Cell::columnIndexFromString($params['offset']);
        }
        // font name
        if (isset($params['font'])) {
            $this->_xls->getActiveSheet()
                ->getStyle($this->_row)
                ->getFont()
                ->setName($params['font']);
        }
        // font size
        if (isset($params['size'])) {
            $this->_xls->getActiveSheet()
                ->getStyle($this->_row)
                ->getFont()
                ->setSize($params['size']);
        }
        // bold
        if (isset($params['bold'])) {
            $this->_xls->getActiveSheet()
                ->getStyle($this->_row)
                ->getFont()
                ->setBold($params['bold']);
        }
        // italic
        if (isset($params['italic'])) {
            $this->_xls->getActiveSheet()
                ->getStyle($this->_row)
                ->getFont()
                ->setItalic($params['italic']);
        }

        // set internal params that need to be processed after data are inserted
        $this->_tableParams = array(
            'header_row' => $this->_row,
            'offset' => $offset,
            'row_count' => 0,
            'auto_width' => array(),
            'filter' => array(),
            'wrap' => array()
        );
        $column = 'A';
        $numRow = 2;
        foreach ($data as $d) {
            $this->_xls->getActiveSheet()->setCellValueByColumnAndRow(
                $offset,
                $this->_row,
                $d['label']
            );
            // get sty of header of file
            if (isset($params['headerStyle'])) {
                $this->_xls->getActiveSheet()->getStyle($column.$this->_row)->applyFromArray($params['headerStyle']);
            }
            // set width
            if (isset($d['width']) && is_numeric($d['width'])) {
                $this->_xls->getActiveSheet()
                    ->getColumnDimensionByColumn($offset)
                    ->setWidth((float)$d['width']);
            } else {
                $this->_tableParams['auto_width'][] = $offset;
            }
            // filter
            if (isset($d['filter']) && $d['filter']) {
                $this->_tableParams['filter'][] = $offset;
            }
            // wrap
            if (isset($d['wrap']) && $d['wrap']) {
                $this->_tableParams['wrap'][] = $offset;
            }
            $offset++;
            $column++;
        }
        $this->_row++;
        return $this;
    }


    public function addStyleTableHeader ($data, $params = array())
    {
        $offset = 0;
        foreach ($data as $d) {
            // set label
            $this->_xls->getActiveSheet()->setCellValueByColumnAndRow(
                $offset,
                $this->_row,
                $d['label']
            );
            // set label
            $this->_xls->getActiveSheet()->getStyle($this->_row)->applyFromArray($params);

            // set width
            if (isset($d['width']) && is_numeric($d['width'])) {
                $this->_xls->getActiveSheet()
                    ->getColumnDimensionByColumn($offset)
                    ->setWidth((float)$d['width']);
            } else {
                $this->_tableParams['auto_width'][] = $offset;
            }
            // filter
            if (isset($d['filter']) && $d['filter']) {
                $this->_tableParams['filter'][] = $offset;
            }
            // wrap
            if (isset($d['wrap']) && $d['wrap']) {
                $this->_tableParams['wrap'][] = $offset;
            }
            $offset++;
        }
        $this->_row++;
        return $this;

    }


    /**
     * Write array of data to current row
     *
     * @param $k
     * @param array $data data
     * @return $this for method chaining
     * @throws \PHPExcel_Exception
     */
    public function addTableRow($k, $data)
    {
        $offset = $this->_tableParams['offset'];
        $this->_xls->getActiveSheet()->setCellValueByColumnAndRow($offset++, $this->_row, $k+1);
        foreach ($data as $d) {
            $this->_xls->getActiveSheet()->setCellValueByColumnAndRow($offset++, $this->_row, $d);
        }
        $this->_row++;
        $this->_tableParams['row_count']++;
        return $this;
    }

    /**
     * End table - set params and styles that required data to be inserted first
     *
     * @return $this for method chaining
     * @throws \PHPExcel_Exception
     */
    public function addTableFooter()
    {
        // auto width
        foreach ($this->_tableParams['auto_width'] as $col) {
            $this->_xls->getActiveSheet()
                ->getColumnDimensionByColumn($col)
                ->setAutoSize(true);
        }
        // filter (has to be set for whole range)
        if (count($this->_tableParams['filter'])) {
            $this->_xls->getActiveSheet()
                ->setAutoFilter(
                    PHPExcel_Cell::stringFromColumnIndex(
                        $this->_tableParams['filter'][0]
                    ) .
                    ($this->_tableParams['header_row']) . ':' .
                    PHPExcel_Cell::stringFromColumnIndex(
                        $this->_tableParams['filter'][count(
                            $this->_tableParams['filter']
                        ) - 1]
                    ) .
                    (
                        $this->_tableParams['header_row'] +
                        $this->_tableParams['row_count']
                    )
                );
        }
        // wrap
        foreach ($this->_tableParams['wrap'] as $col) {
            $this->_xls->getActiveSheet()
                ->getStyle(
                    PHPExcel_Cell::stringFromColumnIndex($col) .
                    ($this->_tableParams['header_row'] + 1) . ':' .
                    PHPExcel_Cell::stringFromColumnIndex($col) .
                    (
                        $this->_tableParams['header_row'] +
                        $this->_tableParams['row_count']
                    )
                )
                ->getAlignment()->setWrapText(true);
        }
        return $this;
    }

    /**
     * Write array of data to current row starting from column defined by offset
     *
     * @param array $data data
     * @param int $offset number row
     *
     * @return $this for method chaining
     */
    public function addData($data, $offset = 0)
    {
        // solve textual representation
        if (!is_numeric($offset)) {
            $offset = PHPExcel_Cell::columnIndexFromString($offset);
        }
        foreach ($data as $d) {
            $this->_xls->getActiveSheet()
                ->setCellValueByColumnAndRow($offset++, $this->_row, $d);
        }
        $this->_row++;
        return $this;
    }

    /**
     * Get array of data from current row
     *
     * @param int $max max row
     *
     * @return array row contents
     */
    public function getTableData($max = 100)
    {
        if ($this->_row > $this->_maxRow) {
            return false;
        }
        $data = array();
        for ($col = 0; $col < $max; $col++) {
            $data[] = $this->_xls->getActiveSheet()
                ->getCellByColumnAndRow($col, $this->_row)
                ->getValue();
        }
        $this->_row++;
        return $data;
    }

    /**
     * Get writer
     *
     * @param object $writer write
     *
     * @return PHPExcel_Writer_Iwriter
     */
    public function getWriter($writer)
    {
        return PHPExcel_IOFactory::createWriter($this->_xls, $writer);
    }

    /**
     * Save to a file
     *
     * @param string $file path to file
     * @param string $writer version excel
     *
     * @return bool
     */
    public function save($file, $writer = 'Excel2007')
    {
        $objWriter = $this->getWriter($writer);
        return $objWriter->save($file);
    }

    /**
     * Output file to browser
     *
     * @param string $filename path to file
     * @param string $writer version office
     *
     * @return exit on this call
     */
    public function output($filename = 'export.xlsx', $writer = 'Excel2007')
    {
        // remove all output
        ob_end_clean();
        // headers
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        // writer
        $objWriter = $this->getWriter($writer);
        $objWriter->save('php://output');
        exit;
    }

    /**
     * Free memory
     *
     * @return void
     */
    public function freeMemory()
    {
        $this->_xls->disconnectWorksheets();
        unset($this->_xls);
    }

    /**
     * Write array of data to current row starting from column defined by offset
     *
     * @param $datas
     * @return $this for method chaining
     * @internal param array $data data
     * @internal param int $offset number row
     *
     */
    public function addDataShukka($datas) {
        $num = 1;
        $total = count($datas);
        foreach ($datas as $data) {
            if ($this->_maxRowTable > 0 && $this->_row > $this->_maxRowTable) {
                $this->addRowTable(
                    $this->_minColumnTable,
                    $this->_maxColumnTable,
                    $this->_maxRowTable,
                    $this->_row
                );
            } 
            foreach ($data as $index => $value) {
                $this->_xls->getActiveSheet()
                    ->setCellValue($index . $this->_row, $value);
            }
            $this->_row++;
            $num++;
        }
        return $this;
    }

    /**
     * @param $srcRow
     * @param $dstRow
     * @param $height
     * @param $width
     */
    function copyRows($srcRow, $dstRow, $height, $width)
    {
        $sheet = $this->_xls->getActiveSheet();
        for ($row = 0; $row < $height; $row++) {
            for ($col = 0; $col < $width; $col++) {
                $cell = $sheet->getCellByColumnAndRow($col, $srcRow + $row);
                $style = $sheet->getStyleByColumnAndRow($col, $srcRow + $row);
                $dstCell = PHPExcel_Cell::stringFromColumnIndex($col) . (string)($dstRow + $row);
                $sheet->setCellValue($dstCell, $cell->getValue());
                $sheet->duplicateStyle($style, $dstCell);
            }

            $h = $sheet->getRowDimension($srcRow + $row)->getRowHeight();
            $sheet->getRowDimension($dstRow + $row)->setRowHeight($h);
        }

        foreach ($sheet->getMergeCells() as $mergeCell) {
            $mc = explode(":", $mergeCell);
            $col_s = preg_replace("/[0-9]*/", "", $mc[0]);
            $col_e = preg_replace("/[0-9]*/", "", $mc[1]);
            $row_s = ((int)preg_replace("/[A-Z]*/", "", $mc[0])) - $srcRow;
            $row_e = ((int)preg_replace("/[A-Z]*/", "", $mc[1])) - $srcRow;

            if (0 <= $row_s && $row_s < $height) {
                $merge = $col_s . (string)($dstRow + $row_s) . ":" . $col_e . (string)($dstRow + $row_e);
                $sheet->mergeCells($merge);
            }
        }
    }

    /**
     * @param $columnFrom
     * @param $columnTo
     * @param $rowFrom
     * @param $rowTo
     * @throws \PHPExcel_Exception
     */
    protected function addRowTable($columnFrom, $columnTo, $rowFrom, $rowTo)
    {
        $sheet = $this->_xls->getActiveSheet();
        $sheet->insertNewRowBefore($rowTo, 1); 
        $sheet = $this->_xls->getActiveSheet();
        for ($columnFrom; $columnFrom <= $columnTo; $columnFrom++) {
            $columnName = PHPExcel_Cell::stringFromColumnIndex($columnFrom);
            $style = $sheet->getStyle($columnName . $rowFrom);
            $sheet->duplicateStyle($style, $columnName . $rowTo);
        }
        foreach ($sheet->getMergeCells() as $mergeCell) {
            $mc = explode(":", $mergeCell);
            $col_s = preg_replace("/[0-9]*/", "", $mc[0]);
            $col_e = preg_replace("/[0-9]*/", "", $mc[1]);
            $row_s = ((int) preg_replace("/[A-Z]*/", "", $mc[0])) - $rowFrom;
            $row_e = ((int) preg_replace("/[A-Z]*/", "", $mc[1])) - $rowFrom;
            if (0 <= $row_s && $row_s < 1) {
                $merge = $col_s . (string)($rowTo + $row_s) . ":" . $col_e . (string)($rowTo + $row_e);
                $sheet->mergeCells($merge);
            }
        }
    }

    /**
     * Get array of data from active sheet
     *
     * @return array row contents
     * @throws \PHPExcel_Exception
     */
    public function getActiveSheetData() {
        $data = array();
        $data = $this->_xls->getActiveSheet()->toArray();
        return $data;
    }

    /**
     * @param $filename
     * @return PHPExcel
     * @throws \PHPExcel_Reader_Exception
     */
    public function identify($filename)
    {
        $objFile = PHPExcel_IOFactory::identify($filename);
        $objData = PHPExcel_IOFactory::createReader($objFile);
        $objData->setReadDataOnly(true);
        $objPHPExcel = $objData->load($filename);
        return $objPHPExcel;
    }

    /**
     * @param $sheet
     * @return int
     */
    public function getTotalColum($sheet)
    {
        $LastColumn = $sheet->getHighestColumn();
        $TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);
        return $TotalCol;
    }

    /**
     * @param $sheet
     * @return mixed
     */
    public function getTotalRow($sheet)
    {
        $Totalrow = $sheet->getHighestRow();
        return $Totalrow;
    }

}
