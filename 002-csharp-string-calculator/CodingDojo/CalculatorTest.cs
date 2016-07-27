using System;
using System.Runtime.Remoting;
using Microsoft.VisualStudio.TestTools.UnitTesting;

namespace CodingDojo
{
    [TestClass]
    public class CalculatorTest
    {
        public Calculator Calculator { get; private set; }


        [TestInitialize]
        public void Initialize()
        {
            Calculator = new Calculator();
        }
        
        [TestMethod]
        public void AddZeroTest()
        {
            Assert.AreEqual(0, Calculator.Add(""));
        }

        [TestMethod]
        public void AddOneNumberTest()
        {
            Assert.AreEqual(1, Calculator.Add("1"));
        }

        [TestMethod]
        public void AddTwoNumbersTest()
        {
            Assert.AreEqual(3, Calculator.Add("1,2"));
        }

        [TestMethod]
        public void AddMoreNumbersTest()
        {
            Assert.AreEqual(10, Calculator.Add("1,2,1,1,1,1,3"));
        }


        [TestMethod]
        public void AddNumbersWithNewLineDelimiterTest()
        {
            Assert.AreEqual(6, Calculator.Add("1\n2,3"));
        }

        [TestMethod]
        [ExpectedException(typeof(NotSupportedException))]
        public void InputStringShouldNotEndedWithNewLine()
        {
            //Assert.AreEqual(1, Calculator.Add("1,\n"));
            Calculator.Add("1,\n");
        }

        [TestMethod]
        public void DelimterTest()
        {
            Assert.AreEqual(6, Calculator.Add("//;\n1;2;3"));
        }
    }
}