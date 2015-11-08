function additem()
            {
                var val = document.getElementById("name").value;
                var tab = document.getElementById("hash").getElementsByTagName("tbody")[0];
                var row = tab.insertRow(0);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                cell1.innerHTML = val;
                cell2.innerHTML = "#pollme"+val;
            }