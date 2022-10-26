<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        // javascript program to check if
        // linked list is circular
        class Node {
            constructor(val) {
                this.data = val;
                this.next = null;
            }
        }

            function isCircular( head) {
                if (head == null)
                    return true;

                node = head.next;

                while (node != null && node != head)
                    node = node.next;

                return (node == head);
            }

            function newNode(data) {
                temp = new Node();
                temp.data = data;
                temp.next = null;
                return temp;
            }

            //Gets the value of circular lined list
                head = newNode(1);
                head.next = newNode(2);
                head.next.next = newNode(3);
                head.next.next.next = newNode(5);

                document.write(isCircular(head) ? "Yes It is a Cricular linked list<br/>" : "No<br/>");



                head = newNode(1);
                head.next = newNode(2);
                head.next.next = newNode(3);
                head.next.next.next = head;

                document.write(isCircular(head) ? "Yes It is a Cricular linked list<br/>" : "No<br/>");
</script>
</body>
</html>