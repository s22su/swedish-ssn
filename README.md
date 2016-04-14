# Swedish SSN number (Personnummer) validator and generator (PHP)

Hope it will speed up someone's work.

Generator generates SSN with birthday between  years 1950 and 1997 (I was too lazy to write some other random date generator logic).

(really) Fastly written Swedish SSN number generator and validator class.
Has three methods that are self-descriptive:

  - validate($ssn)
  - calculateChecksus($ssn)
  - generate()

Use at your own risk. **_Any comments and additions are welcome._**
## Example
```
$SSN = new SwedishSSN();
$generatedSSN = $SSN->generate(); //generate random SSN (actually there is date range 1950 - 1997)
$isValid = $SSN->validate($generatedSSN); //validate SSN number
```

## Author
Sergei Beregov - https://twitter.com/pros22su

## License
MIT
