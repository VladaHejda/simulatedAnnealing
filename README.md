Máme dataset, který představuje cenu letenky mezi dvěma lokacemi. Lokace jsou označeny písmeny latinky. Je třeba v rozumném čase najít ne nutně nejlepší, nicméně alespoň uspokojivé pořadí lokací, při kterém bude cena co nejnižší.

## Hrubá síla

Nejlepší možnou variantu lze získat pouze takzvaným bruteforce - hrubou silou. Tzn. vyzkoušet všechny možné kombinace a porovnat je mezi sebou. To ovšem stojí velmi mnoho výpčetní síly, a v praxi to tudíž ani použít nelze.

- Pro hrubou sílu spusť *bruteforce.php*

## Simulované žíhání

Existuje ovšem algoritmus takzvaného simulovaného žíhání, který dokáže v přívětivém čase najít velmi dobré řešení. Není zaručeno, že řešení je nejlepší, ale je dostatečně dobré, za cenu markantní úspory výpočetní síly.

- Pro simulované žíhání spusť *SA.php*
