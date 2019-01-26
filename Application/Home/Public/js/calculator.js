function result() {
            var A = parseInt(document.getElementById("a1").value);
            var n = parseInt(document.getElementById("a2").value);
            var a1 = parseInt(document.getElementById("a3").value);
            var a2 = parseInt(document.getElementById("a4").value);
            var m = parseInt(document.getElementById("a5").value);
            var a3 = 3.0;
            var a4 = 2.5;
            var a5 = 4.0;
            var b1 = 2.0;
            var b2 = 1.35;
            var b3 = parseInt(document.getElementById("a11").value);
            var b4 = parseInt(document.getElementById("a12").value);
            var b5 = 1;
            var c1 = 0.46;
            var c2 = parseInt(document.getElementById("a15").value);
            var g = 1;
            var c3 = 0;
            var c4 = 1.32;
            var B1 = 1, time = 1, i = 1, j = 1, I = 1, J = 1, B2 = 1, i1 = 1, j1 = 1;
            if (n < m) {
                for (i = 1, j = 1; i <= 12 * m; i++) {
                    j = j * (1 + a1 / 1200);
                }
                B1 = A * j * a1 / 1200 / (j - 1);
                var initial_costs = 1;
                initial_costs = A * a2 / 100 + A * b3 / 100;
                for (i = 1, j = 1; i <= n ; i++) {
                    j = j * (1 + a3 / 100);
                }
                for (I = 1, J = 1; I <= n ; I++) {
                    J = J * (1 + b1 / 100);
                }
                var recurring_costs = 1;
                recurring_costs = B1 * n * 12 + A * b2 / 100 * (j - (1 + a3 / 100)) / a3 * 100 + A * (1 + a3 / 100) * (1 + a3 / 100) * b5 / 100 * (J - 1) / b1 * 100 + A * c1 / 100 * (j - (1 + a3 / 100) * (1 + a3 / 100)) / a3 * 100 + c2 * n * 12;

                for (i1 = 1, j1 = 1; i1 <= n; i1++) {
                    j1 = j1 * a5 / 100;
                }
                var opportunity_costs = 1;

                opportunity_costs = (A * a2 / 100 + A * b3 / 100 + A * (1 + a3 / 100) * (b2 / 100 + b5 / 100 + c1 / 100) + c2) * a5 / 100 * (a5 / 100 - j1) / (1 - a5 / 100) * n + B1 * a5 / 100 * 6 * n * (n + 1) + ((B1 * n * 12 + A * b2 / 100 * (j - (1 + a3 / 100) * (1 + a3 / 100)) / a3 * 100 + A * (1 + a3 / 100) * b5 / 100 * (J - 1) / b1 * 100 + A * c1 / 100 * (j - (1 + a3 / 100) * (1 + a3 / 100)) / a3 * 100 + c2 * n * 12) - B1 * n * 12) * a5 / 100;

                for (i = 1, j = 1; i <= n +1 ; i++) {
                    j = j * (1 + a3 / 100);
                }
                for (I = 1, J = 1; I <= 12 * n; I++) {
                    J = J * (1 + a1 / 1200);
                }
                var net_proceeds = 1;
                net_proceeds = A * j * (1 - b4 / 100) - A * J + B1 * (J - 1) / a1 * 100 * 12;
                var total = 1;
                total = initial_costs + recurring_costs + opportunity_costs - net_proceeds;
                for (i = 1, j = 1; i <= n + 2; i++) {
                    j = j * (1 + a4 / 100);
                }
                var temporary = 1;
                temporary = (j - (1 + a4 / 100)) / a4 * 100 + c3 / 100 + n / 12 * a5 / 100 + a5 / 100 * n * (n + 1) / 2;
                B2 = total / temporary / 12.3 - (8.84-n)*26;
                return B2;
            }
            if(n >= m) {
                for (i = 1, j = 1; i <= 12 * m; i++) {
                    j = j * (1 + a1 / 1200);
                }
                B1 = A * j * a1 / 1200 / (j - 1);

                var initial_costs = 1;
                initial_costs = A * a2 / 100 + A * b3 / 100;
                for (i = 1, j = 1; i <= n + 2; i++) {
                    j = j * (1 + a3 / 100);
                }
                for (I = 1, J = 1.1; I <= n + 2; I++) {
                    J = J * (1 + b1 / 100);
                }
                var recurring_costs = 1;
                recurring_costs = B1 * m * 12 + A * b2 / 100 * (j - 1 ) / a3 * 100 + A * (1 + a3 / 100) * b5 / 100 * (J - 1) / b1 * 100 + A * c1 / 100 * (j - 1) / a3 * 100 + c2 * n * 12;
                for (i1 = 1, j1 = 1; i1 <= n + 1; i1++) {
                    j1 = j1 * a5 / 100;
                }
                var opportunity_costs = 1;
                opportunity_costs = (A * a2 / 100 + A * b3 / 100 + A * (1 + a3 / 100) * (b2 / 100 + b5 / 100 + c1 / 100) + c2) * a5 / 100 * (a5 / 100 - j1) / (1 - a5 / 100) * n + B1 * a5 / 100 * 6 * m * (m + 1) + B1 * a5 / 100 * 12 * m * (n - m) + ((B1 * m * 12 + A * b2 / 100 * (j*1.1 - 1) / a3 * 100 + A * (1 + a3 / 100) * b5 / 100 * (J*1.1 - 1) / b1 * 100 + A * c1 / 100 * (j*1.1 - 1) / a3 * 100 + c2 * n * 12) - B1 * m * 12) * a5 / 100;

                for (i = 1, j = 1; i <= n -1 ; i++) {
                    j = j * (1 + a3 / 100);
                }

                var net_proceeds = 1;
                net_proceeds = A * j * (1 - b4 / 100);
                var total = 1;
                total = initial_costs + recurring_costs + opportunity_costs - net_proceeds;
                for (i = 1, j = 1; i <= n - 1; i++) {
                    j = j * (1 + a4 / 100);
                }
                var temporary = 1;
                temporary = (j - (1 + a4 / 100)) / a4 * 100 + c3 / 100 + (n - 1) / 12 * a5 / 100 + a5 / 100 * (n-1) * (n - 2) / 2;
                B2 = total / temporary / 10;
                return B2;
            }
        }
        function compute() {
            var num = result();
            document.getElementById("price").innerHTML = parseInt(num*4/5);
        }