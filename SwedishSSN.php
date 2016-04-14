<?php

class SwedishSSN {
  /**
   * Validate Swedish SSN number
   * @param  string $ssn SSN number
   * @return bool        true if valid, false if invalid
   */
  public function validate($ssn) {
      if (!preg_match("/^\d{6}\-\d{4}$/", $ssn)) {
          return false;
      }

      $checksum = $this->calculateChecksum($ssn);

      if($checksum !== (int)$ssn[10]) {
          return false;
      }

      //check date format
      $ex = explode('-', $ssn);
      $vals = str_split($ex[0], 2);
      if(count($vals) != 3) {
          return false;
      }

      $vals[0] = (int) $vals[0] + 1900;

      if (!checkdate((int)$vals[1], (int)$vals[2], (int)$vals[0])) {
          return false;
      }
      return true;
  }

  /**
   * Calculate checksum for given SSN
   * @param  string $ssn SSN number
   * @return int
   */
  public function calculateChecksum($ssn) {
    $pnum = str_replace('-', '', $ssn);
    $len = strlen($pnum);
    if($len == 10) {
        $pnum = substr($pnum, 0, 9);
    }

    $checksum = 0;
    $onetwo = 1;
    for($i = 0; $i < 9; $i++) {
        $onetwo = $onetwo==1?2:1;
        $tmp = $pnum[$i] * $onetwo;
        if($tmp > 9) {
            $tmp = $tmp - 10 + 1;
        }
        $checksum += $tmp;
    }
    $checksum %= 10;
    if($checksum != 0) {
        $checksum = 10 - $checksum;
    }

    return $checksum;
  }

  /**
   * Generates random Swedish SSH number
   * @return string SSN
   */
  public function generate() {
    // NB! I have no time to generate random date "a better way"
    // Will just enter random dates here ar min max values
    $min = '1950-01-01';
    $max = '1997-01-01';
    $birthday = date("ymd", mt_rand(strtotime($min),strtotime($max)));
    $second_part = mt_rand(1000, 9999);
    $ssn = $birthday . '-' . $second_part;
    $checksum = $this->calculateChecksum($ssn);
    $ssn[10] = $checksum;
    return $ssn;
  }
}
